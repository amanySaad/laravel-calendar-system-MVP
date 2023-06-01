<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreEventRequest;
use App\Http\Requests\API\UpdateEventRequest;
use App\Interfaces\EventInterface;
use App\Models\Event;
use App\Services\Events\DeleteEventService;
use App\Services\Events\ListEventsService;
use App\Services\Events\ListEventsLocationsService;
use App\Services\Events\ShowEventService;
use App\Services\Events\UpdateEventService;
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
     * if we have more filters we should use
     * Pipeline Design Pattern
     */
    public function index(Request $request,ListEventsService $service)
    {
        return $service->handle($request,$this->eventInterface);

    }

 /**
     * Display a listing of the locations.
     * Based on specific date
     *
     */
    public function getLocations(Request $request,ListEventsLocationsService $service)
    {
        return $service->handle($request,$this->eventInterface);

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
    public function show(Event $event, ShowEventService $service)
    {
        return $service->handle($event);

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
    public function update(StoreEventRequest $request, Event $event, UpdateEventService $service)
    {
        return $service->handle($request, $event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, DeleteEventService $service)
    {
        return $service->handle($event);
    }
}
