<?php

namespace App\Http\Controllers;

use App\Article;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Methode 1 with consturctor
        $article = Article::create([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'price' => $request->input('price'),
            'picture_id' => null
            ]);
        */
        // Methode 2 with setters

        // Adding article picture
        $path = $request->file('picture')->store('public');

        $picture = new Picture();
        $picture->name = $request->file('picture')->path();
        //$picture->name = $request->picture->name()
        $picture->extention = $request->file('picture')->extension();
        $picture->path = $path;
        $picture->save();
        

        $article = new Article();
        $article->name = $request->input('name');
        $article->desc = $request->input('desc');
        $article->price = $request->input('price');
        $article->picture_id = $picture->id;
        $article->save();

        return redirect('articles/'.$article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $picture = Picture::findOrFail($article->picture_id);
        $picture = Storage::url($picture->path);
        return view('articles.show', [
            'article' => $article,
            'picture' => $picture,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $picture = Picture::findOrFail($article->picture_id);
        $picture = Storage::url($picture->path);
        return view('articles.edit', [
            'article' => $article,
            'picture' => $picture,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->name = $request->input('name');
        $article->desc = $request->input('desc');
        $article->price = $request->input('price');

        if($request->has('picture')){
            $path = $request->file('picture')->store('public');
            $picture = findOrFail($article->picture_id);
            $picture->name = $request->file('picture')->path();
            //$picture->name = $request->picture->name()
            $picture->extention = $request->file('picture')->extension();
            $picture->path = $path;
            $picture->save();
        }
        
        $article->save();
        
        return redirect('articles/'.$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $picture = Picture::findOrFail($article->picture_id);
        $picture->delete();
        $article->delete();

        return redirect('articles');
    }
}
