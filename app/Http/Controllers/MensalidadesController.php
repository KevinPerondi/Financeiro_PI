<?php

namespace PI\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PI\Http\Requests;
use Carbon\Carbon;

class MensalidadesController extends Controller
{   public $preçoMensalidade=100;
    
    public function __construct(\PI\Repositories\MensalidadeRepositoryEloquent $repository) {
        $this->repository =$repository;
    }

    public function user($user_id){

    	$mensalidades = DB::table('mensalidades')->where('user_id','=',$user_id)->paginate(5);
        return view('mensalidades.user', compact('mensalidades'));
    }


    public function create(){
       return view('mensalidades.create');
    }

    public function insert(){
       $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('mensalidades')->insertGetId(
            ['valor'=>$this->preçoMensalidade, 'user_id' => $user->id,'vencimento'=>Carbon::now()->format('d/m/Y'),'status'=>'Pendente']);
       }
    }


    public function changeMensalidade($novoPreço){
        $this->preçoMensalidade=$novoPreço;
    }

}
