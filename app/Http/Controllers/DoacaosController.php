<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;

class DoacaosController extends Controller
{

    public function __construct(\PI\Repositories\DoacaoRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function index (\PI\Repositories\DoacaoRepositoryEloquent $repository) {
    	
        $doacaos = $this->repository->all();
        return view('doacaos.index', compact('doacaos'));
    }
    
    public function create(){
       return view('doacaos.create');
    }
    
    public function store (Requests\DoacaoRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        $request->session()->flash('alert-success','Doação criada com sucesso.');
        return redirect()->route('admin.doacaos.index');
        
    }

    public function edit($id){
        $doacao = $this->repository->find($id);

        return view ('doacaos.edit',compact('doacao'));
    }

    public function update(Requests\DoacaoRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);
        $request->session()->flash('alert-success','Doação editada com sucesso.');
        return redirect()->route('admin.doacaos.index');

    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->delete($id);
        $request->session()->flash('alert-success','Doação removida com sucesso.');
        return redirect()->route('admin.doacaos.index');

    }

}
