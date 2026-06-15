<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $popularEvents = Event::with(['category', 'ticketCategories', 'schedules'])
            ->where('status', 'published')
            ->latest()
            ->take(5)
            ->get();

        $allEvents = Event::with(['category', 'ticketCategories', 'schedules'])
            ->where('status', 'published')
            ->latest()
            ->get();

        $categories = Category::all();

        return view('events.index', compact('popularEvents', 'allEvents', 'categories'));
    }

    public function show($slug)
    {
        $event = Event::with([
            'category',
            'schedules',
            'ticketCategories',
            'artists',
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        return view('events.show', compact('event'));
    }
}