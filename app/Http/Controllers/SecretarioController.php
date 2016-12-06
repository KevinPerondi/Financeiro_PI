<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class SecretarioController extends Controller
{


	public function index(){
		return view('secretario.index');
	}

    public function users (\PI\Repositories\UserRepositoryEloquent $repository) {
        
        $users = DB::table('users')->where('situacao', '!=','Deletado')->get();
        $usersdeletados = DB::table('users')->where('situacao', '=','Deletado')->get();
        return view('secretario.usuarios', compact('users','usersdeletados'));
    }

    public function mensalidade($user_id){

        $mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->get();
        $saldo=0;
        foreach ($mensalidades as $mensalidade) {
            if($mensalidade->status=='Pendente')
                $saldo=$saldo-$mensalidade->valor;
        }
        
        return view('mensalidades', compact('mensalidades'))->with('saldo',$saldo);
    }

    public function doacaos (\PI\Repositories\DoacaoRepositoryEloquent $repository) {
        
        $doacaos = DB::table('doacaos')->get();
        return view('secretario.doacoes', compact('doacaos'));
    }

	public function despesas (\PI\Repositories\DespesaRepositoryEloquent $repository) {
    	
        $despesas = DB::table('despesas')->get();
        return view('secretario.despesas', compact('despesas'));
    }

    public function mensalidades(){
        $user_id = Auth::user()->id;

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->get();
        $saldo=0;
        foreach ($mensalidades as $mensalidade) {
            if($mensalidade->status=='Pendente')
                $saldo=$saldo-$mensalidade->valor;
        }
        
        return view('secretario.mensalidades', compact('mensalidades'))->with('saldo',$saldo);
    }


    public function cadastro(){
        $user_id = Auth::user()->id;
        $user = DB::table('users')->where('id','=',$user_id)->get();
       // dd($user);

        return view ('secretario.edit')->with('user',$user[0]);
    }

    public function update(Requests\SecretarioRequest $request, $id){
        $data = $request->all();
        $result = DB::table('users')->where('id','=',$id)->first();
        //dd($data);
        DB::table('users')->where('id','=',$id)->update(['email' => $data['email'], 'telefone' => $data['telefone'], 'endereço' => $data['endereço'] ]);
        $request->session()->flash('alert-success','Usuário modificado com sucesso.');
        return redirect('secretario/index');
        
    }

}
