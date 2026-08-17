<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $musics = Music::all();
        return $musics;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'album' => 'required',
            'duration_seconds' => 'integer',
            'artista' => 'required'
        ]);
        $music = Music::create($validated);
        return $music;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {

        $music = Music::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'album' => 'required',
            'duration_seconds' => 'integer',
            'artista' => 'required'
        ]);
    
        $music->update($validated);
        return $music;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {

        $music = Music::findOrFail($id);
        $music->delete();
    
         return response()->json([
            "message"=> "Recurso deletado", 
            "entity"=> $music
        ], 200);
    
    }
}
