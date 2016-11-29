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
    	
        $despesas = $this->repository->all();
        return view('despesas.index', compact('despesas'));
    }
    
    public function create(){
       return view('despesas.create');
    }
    
    public function store (Requests\DespesasRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        $request->session()->flash('alert-success','Despesa criada com sucesso.');
        return redirect()->route('admin.despesas.index');
        
    }

    public function edit($id){
        $despesa = $this->repository->find($id);

        return view ('despesas.edit',compact('despesa'));
    }

    public function update(Requests\DespesasRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);
        $request->session()->flash('alert-success','Despesa editada com sucesso.');
        return redirect()->route('admin.despesas.index');

    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->delete($id);
        $request->session()->flash('alert-success','Despesa removida com sucesso.');
        return redirect()->route('admin.despesas.index');

    }

}
