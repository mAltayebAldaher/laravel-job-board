<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        $data= Post::Paginate(10);

        return view('post.index',['posts' => $data ,"pageTitle" => "blog"]);
    } 

    function show($id){
        $post= Post::findOrFail($id);

        return view('post.show',['post' => $post , "pageTitle" => $post->title]);
    }

    function create(){
        // post::create([
        //     'title' => 'title......dsttjsfg',
        //     'body' => 'body ......fsgjsfjs',
        //     'author' => 'taieb',
        //     'published' => true
        // ]);
        Post::factory(10)->create();
        return redirect('/blog');
    }
    function delete(){
       Post::destroy(3);
    }
}

 