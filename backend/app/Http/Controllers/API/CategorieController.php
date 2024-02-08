<?php

namespace App\Http\Controllers\API;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::all();

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameCategories' => 'required|max:50',

        ]);
        $categorie = Categorie::create($request->all());

        return response()->json([
            'status'  => 'Success',
            'data' => $categorie,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie = DB::table('categories')
            ->where('id', '=', $id)
            ->get();

        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'nameCategories' => 'required|max:50',

        ]);
        $categorie->update($request->all());

        return response()->json([
            'status'  => 'Success',
            'data' => $categorie,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $category = Categorie::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
