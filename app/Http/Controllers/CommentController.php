<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('comments.create', [
            'idArticle' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $userId = Auth()->user()->id;

        $comment = new Comment();
        $comment->text = $request->text;
        $comment->article_id = $id;
        $comment->user_id = $userId;
        $comment->save();

        return redirect('articles/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        return view('comments.edit', [
            'comment' => $comment,
            'idArticle' => $id,
            'commentId' => $commentId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->text = $request->text;
        $comment->save(); 
        
        return redirect('articles/'.$id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return redirect('articles/'.$id);
    }
}
