<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private function file_operation($request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filepath=$image->store("images","posts_uploads" );
            return $filepath;
        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creators = User::all();
        return view('create', ['creators' => $creators]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $file_path = $this->file_operation($request);

        $request_parms = request()->all();
        $request_parms['image'] = $file_path;

        $post = Post::create($request_parms);
        $post->save();

        return redirect()->route('posts.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $creator = $post->creator;
        return view('show', compact('post', 'creator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $creators = User::all();
        return view('edit', compact('post', 'creators'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $file_path = $this->file_operation($request);
            $post->image = $file_path;
        }

        $post->title = $request->title;
        $post->creator_id = $request->creator_id;

        $post->save();

        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function restoreAll()
    {
        $posts = Post::onlyTrashed()->get();

        foreach ($posts as $post) {
            $post->restore();
        }

        return redirect()->route('posts.index')->with('success', 'All posts restored successfully.');
    }
}
