<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PI\Http\Requests;
use Carbon\Carbon;

class MensalidadesController extends Controller
{ 
    
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


    public function create(){
       return view('mensalidades.create');
    }

    public function insert(){
       $users = DB::table('users')->get();
        foreach ($users as $user) {
            DB::table('mensalidades')->insertGetId(
            ['valor'=>100, 'user_id' => $user->id,'vencimento'=>Carbon::now()->format('d/m/Y'),'status'=>'Pendente']);
       }
    }


    public function changeMensalidade($novoPreço){
        $this->preçoMensalidade=$novoPreço;
    }

    public function edit($id){
        DB::table('mensalidades')
            ->where('id','=', $id)
            ->update(['status' => 'Pago']);

            Session::flash('alert-success','Mensalidade paga com sucesso.');
            return redirect()->back();
    }

}
