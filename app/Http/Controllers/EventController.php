<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::upcoming()
            ->orderBy('date', 'asc')
            ->paginate(12);
            
        return view('events.index', compact('events'));
    }
    
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
    
    public function featured()
    {
        $events = Event::featured()
            ->upcoming()
            ->orderBy('date', 'asc')
            ->limit(6)
            ->get();
            
        return $events;
    }
}
