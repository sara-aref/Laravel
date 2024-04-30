@extends('layouts.app')

@section("body")
<a href="{{ route('post.create') }}" class="btn btn-info">Create Post</a>
<table class="table">
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Body</td>
        <td>Actions</td>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post['id'] }}</td>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['body'] }}</td>
        <td>
            <a href="{{ route('post.show', $post['id']) }}" class="btn btn-info">View</a>
            <a href="{{ route('post.edit', $post['id']) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('post.destroy', $post['id']) }}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
