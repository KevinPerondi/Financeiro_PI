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
    
    public function store (\Symfony\Component\HttpFoundation\Request $request){
        $data = $request->all();
        $this->repository->create($data);
        
        return redirect()->route('users.home');
        
    }
    
}
