<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

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

    public function mensalidades(Requests\UserRequest $request){
        $data = $request->all();
        dd($data);
        $user_id = $data->id;

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->get();
        $saldo=0;
        foreach ($mensalidades as $mensalidade) {
            if($mensalidade->status=='Pendente')
                $saldo=$saldo-$mensalidade->valor;
        }
        
        return view('usuario.mensalidades', compact('mensalidades'))->with('saldo',$saldo);
    }


    public function cadastro(){
        $user = $this->repository->find($id);

        return view ('users.edit',compact('user'));
    }
}
