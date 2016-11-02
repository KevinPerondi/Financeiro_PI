<?php

namespace PI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PI\Repositories\DoacaoRepository;
use PI\Models\Doacao;
use PI\Validators\DoacaoValidator;

/**
 * Class DoacaoRepositoryEloquent
 * @package namespace PI\Repositories;
 */
class DoacaoRepositoryEloquent extends BaseRepository implements DoacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Doacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
