<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Show;
use App\Http\Controllers\ShowController;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::with('shows') ->get();

        // Starts building the query
        $query = Show::query();

        $shows = $query->orderBy('title', 'asc')->get();

        if ($request->wantsJson()) {
            return response()->json($shows);
        }

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied.');
        }

        $shows = Show::all();
        return view('genres.create', compact('shows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'description' => 'required|string|max:255'
        ]);
        
        $genre = Genre::create($validated);

        if ($request->has('shows')) {
            $genre->shows()->attach($request->shows);
        }

        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        $genre->load('shows');
        return (view('genres.show', compact('genre')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        $shows = Show::all();
        $genreShows = $genre->shows->pluck('id')->toArray();
        return view('genres.edit', compact('genre', 'shows', 'genreShows'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'description' => 'required|string|max:255'
        ]);

        $genre->update($validated);

        if ($request->has('shows')) {
            $genre->shows()->sync($request->shows);
        }

        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->shows()->detach();
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully');
    }
}
