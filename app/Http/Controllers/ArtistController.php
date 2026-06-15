<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $query = Artist::withCount('events');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $artists = $query->orderBy('name')->paginate(18)->withQueryString();

        return view('artists.index', compact('artists'));
    }

    public function show(string $slug)
    {
        $artist = Artist::with('songs')
            ->where('slug', $slug)
            ->firstOrFail();

        $upcomingEvents = $artist->upcomingEvents()->get();
        $pastEvents     = $artist->pastEvents()->get();

        $similarArtists = Artist::where('id', '!=', $artist->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('artists.show', compact('artist', 'upcomingEvents', 'pastEvents', 'similarArtists'));
    }
}