<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{


    function index(){
        $posts = Post::paginate($perPage = 3, $columns = ['*'], $pageName = 'posts');
        return view('index', ['posts' => $posts]);
    }

    function create(){
        $users = User::all();
        return view('create', compact('users'));
    }

    private function file_operation($request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filepath=$image->store("images","posts_uploads" );
            return $filepath;
        }
        return null;
    }

    function store(Request $request){
        $request_parms= $request;

        $file_path = $this->file_operation($request_parms);

        $request_parms = request()->all();
        $post = new Post();
        $post->title = $request_parms['title'];
        $post->image = $file_path;
        $post->user = $request_parms['user'];

        $post->save();
        return to_route('post.show', $post->id);
    }

    function edit($id){
        $users = User::all();
        $post = Post::findOrFail($id);
        return view('edit', ['post' => $post], compact('users'));
    }

    function update($id){
        $post = Post::findOrFail($id);
        $updated_data = request()->all();
        $post->title = $updated_data['title'];
        $post->user = $updated_data['user'];

        $post->save();
        return to_route('post.show', $post->id);
    }

    function show($id){
        $post = Post::findOrFail($id);
        return view('show', ['post' => $post]);
    }

    function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('post.index');
    }
}
