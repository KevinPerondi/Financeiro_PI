<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PI\Http\Requests;
use Carbon\Carbon;

class MensalidadesController extends Controller
{ 
    public $valor = 15;
    
    public function __construct(\PI\Repositories\MensalidadeRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function user($user_id){

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->get();
        $saldo=0;
        foreach ($mensalidades as $mensalidade) {
            if($mensalidade->status=='Pendente')
                $saldo=$saldo-$mensalidade->valor;
        }
        
        return view('mensalidades.user', compact('mensalidades'))->with('saldo',$saldo);
    }

    public function insert(){
        $users = DB::table('users')->select('*')->where('situacao','!=','Deletado')->get();
        $valor = DB::table('valores')->select('valor')->where('id','=',1)->get();
        $dia = DB::table('valores')->select('dia')->where('id','=',1)->get();
        foreach ($users as $user) {
            DB::table('mensalidades')->insertGetId(
            ['valor'=>$valor[0]->valor, 'user_id' => $user->id,'vencimento'=>Carbon::now()->startOfMonth()->addMonths(1)->addDays($dia[0]->dia-1)->format('d/m/Y'),'status'=>'Pendente']);
       }
    }

    public function delete(\Symfony\Component\HttpFoundation\Request $request, $id){
        //gambis delete funciona, mas não printa o flash...
        $slct = DB::table('mensalidades')->where('id','=',$id)->first();
        $mes = $slct->vencimento;
        DB::table('mensalidades')->where('vencimento', '=', $mes)->delete();
        Session::flash('alert-success','Mensalidade removida sucesso.');
        return redirect()->route('admin.mensalidades.edit');  
    }

    public function pagar($id){
        DB::table('mensalidades')
            ->where('id','=', $id)
            ->update(['status' => 'Pago']);

            Session::flash('alert-success','Mensalidade paga com sucesso.');
            return redirect()->back();
    }

    public function edit(){
       $mensalidades = DB::table('mensalidades')->where('user_id','=',1)->get();
       $valor = DB::table('valores')->select('valor')->where('id','=',1)->get();
       $dia = DB::table('valores')->select('dia')->where('id','=',1)->get();

        return view('mensalidades.edit', compact('mensalidades'))->with('valor',$valor[0]->valor)->with('dia',$dia[0]->dia);
    }

    public function update(Requests\MensalidadeRequest $request){
        $valor=$request->valor;
        $dia = $request->dia;
        DB::update('update valores set valor = ?', [$valor]);
        DB::update('update valores set dia = ?', [$dia]);
        
        
        $users = DB::table('users')->select('*')->where('situacao','=','Ativo')->get();
        $valor = DB::table('valores')->select('valor')->where('id','=',1)->get();
        $dia = DB::table('valores')->select('dia')->where('id','=',1)->get();
        
        foreach ($users as $user) {
            DB::table('mensalidades')->insertGetId(
            ['valor'=>$valor[0]->valor, 'user_id' => $user->id,'vencimento'=>Carbon::now()->startOfMonth()->addMonths(1)->addDays($dia[0]->dia-1)->format('d/m/Y'),'status'=>'Pendente']);
       }

       Session::flash('alert-success','Mensalidade criada com sucesso.');


        return redirect()->route('admin.mensalidades.edit');

    }

}
