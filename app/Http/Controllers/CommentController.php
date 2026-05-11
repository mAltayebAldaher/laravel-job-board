<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index(){
        $comments=Comment::cursorPaginate(10);

        return view('comment.index',["comments"=>$comments , "pageTitle"=>"comments"]);
    
    }
    function create(){
        // Comment::create([
        //     'author'=>'taieb',
        //     'content'=>'This is test comment',
        //     'post_id'=>'3'
        // ]);
        Comment::factory(10)->create();
        return redirect('/comment');    
        }

}
