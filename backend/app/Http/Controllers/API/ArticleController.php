<?php

namespace App\Http\Controllers\API;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titleArticles' => 'required|max:50',
            'description' => 'required|max:1000',

        ]);
        $article = Article::create($request->all());

        return response()->json([
            'status'  => 'Success',
            'data' => $article,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titleArticles' => 'required|max:50',
            'description' => 'required|max:1000',

        ]);
        $article->update($request->all());

        return response()->json([
            'status'  => 'Success',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
