<?php

namespace PI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Despesa extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'valor',
    	'descrição',
    	'vencimento'
    ];

}
