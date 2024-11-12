<?php

namespace App\Http\Controllers;

use App\Models\Character;
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:32',
            'about' => 'required|string|max:256',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $show->characters()->create([
            'show_id' =>auth() ->id(),
            'name' => $request->input('name'),
            'about' => $request->input('about'),
            'image' => $request->input('image'),
        ]);
        return redirect()->route('shows.show', $show)->with('success', 'Character added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $show->load('characters.user');
        return view('shows.show', compact('show'))->with('show', $show);
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
