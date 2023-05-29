<?php

namespace App\Repositories;

use App\Interfaces\EventInterface;
use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;

class EventRepository extends BaseRepository implements EventInterface
{
    public function __construct(Event $model)
    {
        parent::__construct($model);
    }

    public function paginateByCriteria(array $criteria, array $columns = ['*'], array $relations = []): LengthAwarePaginator
    {
        return $this->newQuery()->select($columns)->with($relations)->where($criteria)->paginate();
    }

}
