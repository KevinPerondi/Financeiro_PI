<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;

use PI\Http\Requests;

class UsersController extends Controller
{
    
    public function __construct(\PI\Repositories\UserRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

        public function index (\PI\Repositories\UserRepositoryEloquent $repository) {
    	
        $users = $this->repository->paginate(5);
        return view('users.index', compact('users'));
    }
    
    
    public function create(){
       return view('users.create');
    }
    
    public function store (Requests\UserRequest $request){
        $data = $request->all();
        $this->repository->create($data);
        $request->session()->flash('alert-success','Usuário criado com sucesso.');
        return redirect()->route('users.home');

        /*$result = DB::tables('users')->where('cpf','=',$data->cpf);
        if (is_null($result)){
            $this->repository->create($data);
            $request->session()->flash('alert-success','Usuário criado com sucesso.');
            return redirect()->route('users.home');
        }
        else{
        //$this->repository->create($data);
        $request->session()->flash('alert-success','CPF já existente.');
        }

        return redirect()->route('users.home');*/
           
    }

    public function edit($id){
        $user = $this->repository->find($id);

        return view ('users.edit',compact('user'));
    }

    public function update(Requests\UserRequest $request, $id){
        $data = $request->all();
        $this->repository->update($data,$id);
        $request->session()->flash('alert-success','Usuário modificado com sucesso.');
        return redirect()->route('users.home');

    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        $data = $request->all();
        $this->repository->delete($id);
        $request->session()->flash('alert-success','Usuário excluído com sucesso.');
        return redirect()->route('users.home');

    }

    
}
