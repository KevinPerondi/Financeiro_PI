<?php

namespace PI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements Transformable 
{
    use TransformableTrait, Notifiable;

    protected $fillable = [
        'cpf','name', 'email','telefone','endereço', 'password', 'role','situacao',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function mensalidades(){
        return $this->hasMany(Mensalidade::class);
    }


}
