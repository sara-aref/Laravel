<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        ['id'=>1, 'title'=>'Learn PHP', 'body'=>'PHP description', 'image' => 'PHP-logo.svg.png'],
        ['id'=>2, 'title'=>'Learn Laravel', 'body'=>'Laravel description', 'image' => '800px-Laravel.svg.png'],
        ['id'=>3, 'title'=>'Learn Ruby', 'body'=>'Ruby description', 'image' => 'Ruby_logo.svg.png']
    ];


    function index(){
        return view('index',['posts'=>$this->posts]);
    }

    function show($id){
        if ($id <= count($this->posts) && $id > 0) {
            $post = $this->posts[$id-1];
            return view('show', ['post' => $post]);
        }
        return abort(404);
    }


    function create(){
        return view('create');
    }

    function edit($id){
        if ($id <= count($this->posts) && $id > 0)
        {
            $post = $this->posts[$id-1];
            return view('edit', ['post'=>$post]);
        }
        return abort(404);
    }

    function destroy($id){
        if ($id <= count($this->posts))
        {
            unset($this->posts[$id-1]);
            return redirect()->route('post.index');
        }
        return abort(404);
    }
}
