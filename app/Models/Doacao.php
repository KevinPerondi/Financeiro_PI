<?php

namespace PI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Doacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'valor',
    	'donatario',
    	'data'
    ];

	/*protected $dates = [
    	
    ];

    /*protected $dateFormat = 'd,m,Y';*/
}
