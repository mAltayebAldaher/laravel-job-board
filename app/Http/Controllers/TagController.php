<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource. function testManyToMany(){
     */
    // $post2 = Post::find(2);
    // $post4 = post::find(4);
    // $post2->tags()->attach([1,2]);
    // $post4->tags()->attach([2]);

    // return response()->json([
    //     'post2' => $post2->tags,
    //     'post4' => $post4->tags
    // ]);
    // $tag = Tag::find(1);
    // $tag->posts()->attach([4]);
    // return response()->json([
    // 'i'=>$tag->title,
    // 'f'=>$tag->posts
    // ]);
    public function index()
    {
        $data =Tag::paginate(10);
        return view('tag.index',['tags' => $data,"pageTitle"=>"tag"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create',["pageTitle"=>"tag -Create New Tag"]);
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
         $data = Tag::find($id);
        return view('tag.show',['tag'=>$data,"pageTitle"=>$data->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tag.edit',["pageTitle"=>"Edit tag"]);
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
