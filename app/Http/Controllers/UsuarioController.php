<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

   public function __construct(\PI\Repositories\DespesaRepositoryEloquent $repository) {
        $this->repository =$repository;
    }
	public function index(){
		return view('usuario.index');
	}

	public function despesas (\PI\Repositories\DespesaRepositoryEloquent $repository) {
    	
        $despesas = $this->repository->paginate(5);
        return view('usuario.despesas', compact('despesas'));
    }

    public function mensalidades(){
        $user_id = Auth::user()->id;

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->get();
        $saldo=0;
        foreach ($mensalidades as $mensalidade) {
            if($mensalidade->status=='Pendente')
                $saldo=$saldo-$mensalidade->valor;
        }
        
        return view('usuario.mensalidades', compact('mensalidades'))->with('saldo',$saldo);
    }


    public function cadastro(){
        $user_id = Auth::user()->id;
        $user = DB::table('users')->where('id','=',$user_id)->get();
       // dd($user);

        return view ('usuario.edit')->with('user',$user[0]);
    }

    public function update(Requests\UserEditRequest $request, $id){
        $data = $request->all();
        $result = DB::table('users')->where('id','=',$id)->first();
        //dd($data);
        DB::table('users')->where('id','=',$id)->update(['email' => $data['email'], 'telefone' => $data['telefone'], 'endereço' => $data['endereço'] ]);
        $request->session()->flash('alert-success','Usuário modificado com sucesso.');
        return redirect('user/usuario');
        
    }

}
