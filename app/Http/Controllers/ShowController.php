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
    public function index()
    {
        $shows = Show::all();
        return view('shows.index', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        if (request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image/shows'), $imageName);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Show $show)
    {
        //
    }
}
