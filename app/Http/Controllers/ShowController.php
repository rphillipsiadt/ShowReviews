<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $shows = Show::all();
    //     return view('shows.index', compact('shows'));
    // }

    /**
     * Search for the name of a show
     */
    public function index(Request $request)
    {
        $episode_count = $request->input('episode_count');
        $year = $request->input('year');
        $title = $request->input('title');
        
        // Starts building the query
        $query = Show::query();
        
        if (!empty($episode_count)) {
            $query->where('episode_count', $episode_count);
        }

        if (!empty($year)) {
            $query->where('year', $year);
        }

        if (!empty($title)) {
            $query->where('title', 'LIKE', "{$title}%");
        }

        // Execute the query and order results by 'title'
        $shows = $query->orderBy('title', 'asc')->get();

        // Check if request expects JSON response (for AJAX search) or HTML view
        if ($request->wantsJson()) {
            return response()->json($shows);
        }

        return view('shows.index', compact('shows'), [
            'title' => $title,
            'year' => $year,
            'episode_count' => $episode_count,
            'shows' => $shows,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied');
        }
        return view('shows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'year' => 'required|integer',
            'episode_count' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/shows'), $imageName);
        }

        // Create a show record in the database
        Show::create([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'episode_count' => $request->episode_count,
            'image' => $imageName, //Store the image URL in the DB
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Redirect to the index page with a success message
        return to_route('shows.index')->with('success', 'Show created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Show $show)
    {
        return view('shows.show')->with('show', $show);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Show $show)
    {
        return view('shows.edit')->with('show', $show);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Show $show)
    {
        // Validate input
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:500',
            'year' => 'required|integer',
            'episode_count' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:8192'
        ]);

        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/shows'), $imageName);
        }

        // Create a show record in the database
        $show->update([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'episode_count' => $request->episode_count,
            'image' => $imageName, //Store the image URL in the DB
            'updated_at' => now()
        ]);

        // Redirect to the index page with a success message
        return to_route('shows.index')->with('success', 'Show edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        $show->delete();

        return to_route('shows.index')->with('success', 'Show deleted successfully!');
    }

}
