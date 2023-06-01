<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface EventInterface extends RepositoryInterface
{
    /**
     * @param array $criteria
     * @param array $columns
     * @param array $relations
     * @return Paginator
     */
    public function paginateByCriteria(array $criteria, array $columns = ['*'], array $relations = [],$sort='id',$specific_date = null): LengthAwarePaginator;

}
