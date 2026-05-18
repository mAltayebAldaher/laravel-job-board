<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommnetRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect('/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommnetRequest $request)
    {
        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect('/blog/'. $request->input('post_id'))->with('success','Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      return redirect('/blog');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    //    @TODO
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //@TODO
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@TODO
    }
}
