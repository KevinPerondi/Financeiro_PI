<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;

use PI\Http\Requests;

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
}
