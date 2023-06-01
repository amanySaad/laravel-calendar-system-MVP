<?php

namespace App\Repositories;

use App\Interfaces\EventInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class EventRepository extends BaseRepository implements EventInterface
{
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    public function paginateByCriteria(array $criteria, array $columns = ['*'], array $relations = [],$sort='id',$specific_date = null): LengthAwarePaginator
    {
        $query = $this->newQuery()->select($columns)->with($relations)->where($criteria);
        if($specific_date){
            $query = $query->whereDate('date_time',$specific_date);
        }
        return $query->orderBy($sort,'DESC')->paginate();
    }

    public function getLocations($distinct_column,$specific_date = null) : Collection
    {
        $query = $this->newQuery();
        if($specific_date){
            $query = $query->whereDate('date_time',$specific_date);
        }
        return $query->distinct()->get([$distinct_column]);

    }

}
