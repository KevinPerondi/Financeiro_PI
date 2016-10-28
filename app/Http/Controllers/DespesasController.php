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
    
    public function store (\Symfony\Component\HttpFoundation\Request $request){
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('despesas.home');
        
    }

    public function edit($id){
        $despesa = $this->repository->find($id);

        return view ('despesas.edit',compact('despesa'));
    }

    public function update(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);

        return redirect()->route('despesas.home');

    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->delete($id);

        return redirect()->route('despesas.home');

    }

}
