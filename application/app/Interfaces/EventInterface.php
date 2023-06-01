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

    /**
     * @param string $distinct_column
     * @param string $specific_date
     * @return Collection
     */
    public function getLocations($distinct_column,$specific_date = null) : Collection;

}
