<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Homepage
    public function index()
    {
        $popularEvents = Event::with(['category', 'ticketCategories', 'schedules'])
            ->where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        $allEvents = Event::with(['category', 'ticketCategories', 'schedules'])
            ->where('status', 'published')
            ->latest()
            ->take(12)
            ->get();

        $categories = Category::all();

        return view('events.index', compact('popularEvents', 'allEvents', 'categories'));
    }

    // Halaman /konser — semua event dengan filter
    public function concerts(Request $request)
    {
        $query = Event::with([
                'category',
                'ticketCategories' => fn($q) => $q->orderBy('price', 'asc'),
                'schedules'        => fn($q) => $q->orderBy('start_time', 'asc'),
            ])
            ->where('status', 'published');

        if ($request->search) {
            $query->where(fn($q) =>
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('venue', 'like', '%' . $request->search . '%')
            );
        }

        if ($request->category) {
            $query->whereHas('category', fn($q) =>
                $q->where('slug', $request->category)
            );
        }

        $events     = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('events.concerts', compact('events', 'categories'));
    }

    // Detail event
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