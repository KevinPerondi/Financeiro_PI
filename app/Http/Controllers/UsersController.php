<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PI\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    
    public function __construct(\PI\Repositories\UserRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

        public function index (\PI\Repositories\UserRepositoryEloquent $repository) {
    	
        $users = DB::table('users')->where('situacao', '!=','Deletado')->get();
        $usersdeletados = DB::table('users')->where('situacao', '=','Deletado')->get();
        return view('users.index', compact('users','usersdeletados'));
    }
    
    
    public function create(){
       return view('users.create');
    }
    
    public function store (Requests\UserRequest $request){
        $data = $request->all();
        $pass = bcrypt($data['password']);
        $data['password']= $pass;
        $data['role']='user';
        $data['situacao'] = 'Ativo';
       // dd($data);
        $result = DB::table('users')->where('cpf','=',$request->cpf)->first();
        if (is_null($result)){
            $this->repository->create($data);
            $request->session()->flash('alert-success','Usuário criado com sucesso.');
            return redirect()->route('admin.users.index');
        }
        else{
        return Redirect::back()->with($request->session()->flash('alert-danger','CPF já existente.'));
        }
    }

    public function edit($id){
        $user = $this->repository->find($id);

        return view ('users.edit',compact('user'));
    }

    public function update(Requests\UserRequest $request, $id){
        $data = $request->all();
        $result = DB::table('users')->where('id','=',$id)->first();

        if ($request->cpf != $result->cpf){
            return Redirect::back()->with($request->session()->flash('alert-danger','O campo CPF foi alterado'));    
        }
        else{
            $this->repository->update($data,$id);
            $request->session()->flash('alert-success','Usuário modificado com sucesso.');
            return redirect()->route('admin.users.index');
        }
    }

    public function remove(\Symfony\Component\HttpFoundation\Request $request, $id){
        DB::table('users')->where('id','=',$id)->update(['situacao' => 'Deletado']);
        //$data = $request->all();
        //$this->repository->delete($id);
        $request->session()->flash('alert-success','Usuário excluído com sucesso.');
        return redirect()->route('admin.users.index');

    }


    public function updaterole(Requests\UserRequest $request, $id){
        $data = $request->all();
        $result = DB::table('users')->where('id','=',$id)->first();

        if ($request->cpf != $result->cpf){
            return Redirect::back()->with($request->session()->flash('alert-danger','O campo CPF foi alterado'));    
        }
        else{
            DB::update('update users where id = ? set role = ?', [$id],'admin');
            $request->session()->flash('alert-success','Usuário modificado com sucesso.');
            return redirect()->route('admin.users.index');
        }
    }

    
}
