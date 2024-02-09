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
            'namePlace' => 'required|max:100',
            'adressPlaces' => 'required|max:255',
            'zipCodePlaces' => 'required|max:50',
            'phonePlaces' => 'required|max:100',

        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }



        $place = Place::create(array_merge($request->all(), ['image' => $filename]));

        return response()->json([
            'status'  => 'Success',
            'message' => 'Joueur ajouté avec succès',
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
            'namePlace' => 'required|max:100',
            'adressPlaces' => 'required|max:255',
            'zipCodePlaces' => 'required|max:50',
            'phonePlaces' => 'required|max:100',

        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $filenameWithoutExt . '' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $place->update(array_merge($request->all(), ['image' => $filename]));

        return response()->json([
            'status'  => 'Mise à jour avec succèss',
            'message' => 'Mise à jour réussie',
            'data' => $place,

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
