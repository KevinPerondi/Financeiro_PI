<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PI\Http\Requests;

class MensalidadesController extends Controller
{
    public function __construct(\PI\Repositories\MensalidadeRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function user($user_id){

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->paginate(5);
        return view('mensalidades.user', compact('mensalidades'));
    }

}
