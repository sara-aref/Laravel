
@extends('layouts.app')

@section("body")
<a href="{{ route('post.create') }}" class="btn btn-info">Create Post</a>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Posted by</td>
        <td>Actions</td>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user }}</td>
        <td>
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            <form method="post" action="{{route('post.destroy', $post->id)}}">
                @method('delete')
                @csrf
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $posts->links() }}
@endsection
