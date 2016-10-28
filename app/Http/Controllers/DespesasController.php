<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;

class DespesasController extends Controller
{

    public function __construct(\PI\Repositories\DespesaRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function index (\PI\Repositories\DespesaRepositoryEloquent $repository) {
    	
        $despesas = $this->repository->paginate(5);
        return view('despesas.index', compact('despesas'));
    }
    
    public function create(){
       return view('despesas.create');
    }
    
    public function store (Requests\DespesasCategoryRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('despesas.home');
        
    }
}
