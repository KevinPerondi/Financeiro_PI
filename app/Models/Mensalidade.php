<?php

namespace PI\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Mensalidade extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    'id_membro','valor','vencimento','status',];

}
