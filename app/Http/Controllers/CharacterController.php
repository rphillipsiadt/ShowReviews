<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Show; // Correctly import the Show model
use Illuminate\Http\Request;
use App\Http\Controllers\ShowController;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, Show $show)
    {
        $request->validate([
            'name' => 'required|string|max:32',
            'about' => 'required|string|max:256',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Save the uploaded image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/characters'), $imageName);
        }

        // Create the character associated with the show
        $show->characters()->create([
            'name' => $request->input('name'),
            'about' => $request->input('about'),
            'image' => $imageName ?? null
        ]);

        return redirect()->route('shows.show', $show->id)->with('success', 'Character added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $character->load('show'); // Load related show
        return view('shows.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        // Check if user is the not admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('shows.index')->with('error', 'Access denied.');
        }

        // I am passing the show and the character object to the view, as they are both needed
        return view('characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character, Show $show)
{
    // Check to ensure the user is authorized to update this content
    $request->validate([
        'name' => 'required|string|max:32',
        'about' => 'required|string|max:256',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Make image nullable, because it might not always be updated
    ]);

    // Save the uploaded image (if provided)
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/characters'), $imageName);
    }

    // Update the character's data
    $character->update([
        'name' => $request->input('name'),
        'about' => $request->input('about'),
        'image' => $imageName ?? $character->image, // If no new image is uploaded, keep the existing one
    ]);

    // Redirect back to the show page with a success message
    return redirect()->route('shows.index')->with('success', 'Character updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return to_route('shows.index')->with('success', 'Character deleted successfully!');
    }
}
