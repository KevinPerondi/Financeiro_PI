<?php

namespace PI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Doação extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    'donatario',
    'valor',
    'data',


    ];

}
