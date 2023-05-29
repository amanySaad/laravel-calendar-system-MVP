<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreEventRequest;
use App\Http\Requests\API\UpdateEventRequest;
use App\Interfaces\EventInterface;
use App\Models\Event;
use App\Resources\Events\ListEventsResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Events\StoreEventService;

class EventController extends Controller
{
    protected $eventInterface;
    public function __construct(EventInterface $eventInterface)
    {
        $this->eventInterface = $eventInterface;
    }



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $filters = [];
            $events = $this->eventInterface->paginateByCriteria($filters);
            return $this->success(ListEventsResource::collection($events))->pagination($events);
        }catch (\Exception $exception){
           return $this->error()->server();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request,StoreEventService $service)
    {
        return $service->handle($request,$this->eventInterface);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
