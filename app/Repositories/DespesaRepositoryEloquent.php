<?php

namespace PI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PI\Repositories\DespesaRepository;
use PI\Models\Despesa;
use PI\Validators\DespesaValidator;

/**
 * Class DespesaRepositoryEloquent
 * @package namespace PI\Repositories;
 */
class DespesaRepositoryEloquent extends BaseRepository implements DespesaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Despesa::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
