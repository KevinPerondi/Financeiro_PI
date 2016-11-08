<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;

use PI\Http\Requests;

class MensalidadesController extends Controller
{
    public function __construct(\PI\Repositories\MensalidadeRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function user($id_membro){

    	$mensalidade = $this->repository->find($id_membro);
    	return view ('mensalidade.user',compact('mensalidade'));
    }

}
