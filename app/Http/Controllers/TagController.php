<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index() {
        $data= Tag::all();

        return view('tag.index',['tags' => $data ,"pageTitle" => "tags"]);
    } 

    function create(){
        tag::create([
            'title' => 'tayeb the beast ',
        ]);
        return redirect('/tags');
    }
    function testManyToMany(){

    // $post2 = Post::find(2);
    // $post4 = post::find(4);
    // $post2->tags()->attach([1,2]);
    // $post4->tags()->attach([2]);

    // return response()->json([
    //     'post2' => $post2->tags,
    //     'post4' => $post4->tags
    // ]);
    $tag = Tag::find(1);
    $tag->posts()->attach([4]);
    return response()->json([
    'i'=>$tag->title,
    'f'=>$tag->posts
    ]);
    }
}

