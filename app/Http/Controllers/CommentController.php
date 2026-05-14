<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments=Comment::cursorPaginate(10);

        return view('comment.index',["comments"=>$comments , "pageTitle"=>"comments"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //function create(){
        // Comment::create([
        //     'author'=>'taieb',
        //     'content'=>'This is test comment',
        //     'post_id'=>'3'
        // ]);
        // Comment::factory(10)->create();
        // return redirect('/comment');    
        // }
        return view('comment.create',["pageTitle"=>"Blog -Create New Comment"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //@TODO
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::with('post')->find($id);
        return view('comment.show',['comment'=>$comment,"pageTitle"=>"comment -Show Comment"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       return view('comment.edit',["pageTitle"=>"Edit Comment"]);
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
