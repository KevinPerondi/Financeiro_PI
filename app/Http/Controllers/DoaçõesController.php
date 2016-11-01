<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use PI\Http\Requests;

class DoaçõesController extends Controller
{

    public function __construct(\PI\Repositories\DoaçãoRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function index (\PI\Repositories\DoaçãoRepositoryEloquent $repository) {
    	
        $doações = $this->repository->paginate(5);
        return view('doações.index', compact('doações'));
    }
    
    public function create(){
       return view('doações.create');
    }
    
    public function store (Requests\DoaçõesRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        $request->session()->flash('alert-success','Doações criada com sucesso.');
        return redirect()->route('doações.home');
        
    }

    public function edit($id){
        $despesa = $this->repository->find($id);

        return view ('doações.edit',compact('despesa'));
    }

    public function update(Requests\DoaçõesRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);
        $request->session()->flash('alert-success','Doações editada com sucesso.');
        return redirect()->route('doações.home');

    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->delete($id);
        $request->session()->flash('alert-success','Doações removida com sucesso.');
        return redirect()->route('doações.home');

    }

}
