<?php

namespace PI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PI\Repositories\DoaçãoRepository;
use PI\Models\Doação;
use PI\Validators\DoaçãoValidator;

/**
 * Class DoaçãoRepositoryEloquent
 * @package namespace PI\Repositories;
 */
class DoaçãoRepositoryEloquent extends BaseRepository implements DoaçãoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Doação::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
