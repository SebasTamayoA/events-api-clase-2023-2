<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequestCreate;
use App\Http\Requests\EventRequestUpdate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequestCreate $request)
    {
        $event = Event::create($request->all());
        return response()->json(['event' => $event], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json(['event' => $event], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequestUpdate $request, Event $event)
    {
        $event->update($request->all());
        return response()->json(['event' => $event], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['event' => $event], Response::HTTP_ACCEPTED);
    }
}
