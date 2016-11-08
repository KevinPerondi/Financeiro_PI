<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PI\Http\Requests;
use Carbon\Carbon;

class MensalidadesController extends Controller
{ 
    private $valor = 10;
    
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
       $users = DB::table('users')->get();
        foreach ($users as $user) {
            DB::table('mensalidades')->insertGetId(
            ['valor'=>$this->valor, 'user_id' => $user->id,'vencimento'=>Carbon::now()->format('d/m/Y'),'status'=>'Pendente']);
       }
    }

    public function delete(\Symfony\Component\HttpFoundation\Request $request, $mes){
        /*DB::table('mensalidades')->delete()->where('vencimento','=',$data);
            Session::flash('alert-success','Mensalidade removida sucesso.');
            return redirect()->back();*/

        $data = $request->all();
        $this->repository->delete($mes);
        $request->session()->flash('alert-success','Mensalidade removida sucesso.');
        return redirect()->route('mensalidades.edit');            
    }

    public function pagar($id){
        DB::table('mensalidades')
            ->where('id','=', $id)
            ->update(['status' => 'Pago']);

            Session::flash('alert-success','Mensalidade paga com sucesso.');
            return redirect()->back();
    }

    public function edit(){
        return view ('mensalidades.edit');
    }

    public function update(Requests\DespesasRequest $request, $valorNovo){
        $this->valor = $valorNovo;
        $request->session()->flash('alert-success','Mensalidade alterada com sucesso.');
        return redirect()->route('home');

    }

}
