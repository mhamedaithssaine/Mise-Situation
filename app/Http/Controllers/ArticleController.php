<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::with('category')->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category =Category::all();
        return view('articles.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required|min:4',
            'description'=>'required|max:255',
            'category_id'=>'exists:categories,id'

        ]);

        Article::create([
            'titre'=>$request->titre,
            'description'=>$request->titre,
            'category_id'=>$request->titre,

        ]);

        return redirect()->route('articles.index')->with('success','articles created succefuly');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article=Article::find($id)->get();
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles=Article::find($id);
        return view('articles.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre'=>'required|min:4',
            'description'=>'required|max:255',
            'category_id'=>'exists:categories,id'

        ]);

        Article::update([
            'titre'=>$request->titre,
            'description'=>$request->titre,
            'category_id'=>$request->titre,

        ]);
        return redirect()->route('articles.index')->with('success','articles updated succefuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article=Article::find($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success','articles deleted succefuly');
    }
}
