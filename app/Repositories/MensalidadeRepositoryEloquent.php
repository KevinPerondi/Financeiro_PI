<?php

namespace PI\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PI\Repositories\MensalidadeRepository;
use PI\Models\Mensalidade;
use PI\Validators\MensalidadeValidator;

/**
 * Class MensalidadeRepositoryEloquent
 * @package namespace PI\Repositories;
 */
class MensalidadeRepositoryEloquent extends BaseRepository implements MensalidadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mensalidade::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
