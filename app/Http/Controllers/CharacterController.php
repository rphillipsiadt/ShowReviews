<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Show; // Correctly import the Show model
use Illuminate\Http\Request;

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

        return redirect()->route('shows.show', $show)->with('success', 'Character added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
