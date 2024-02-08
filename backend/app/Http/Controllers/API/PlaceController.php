<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();

        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|max:255',
            'adressPlaces' => 'required|max:255',
            'zipCodePlaces' => 'required|max:50',
            'phonePlaces' => 'required|max:100',

        ]);
        $place = Place::create($request->all());

        return response()->json([
            'status'  => 'Success',
            'data' => $place,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'image' => 'required|max:255',
            'adressPlaces' => 'required|max:255',
            'zipCodePlaces' => 'required|max:50',
            'phonePlaces' => 'required|max:100',

        ]);
        $place->update($request->all());

        return response()->json([
            'status'  => 'Mise à jour avec succèss',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
