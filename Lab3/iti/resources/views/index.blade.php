@extends('layouts.app')

@section("content")
    <a href="{{ route('posts.create') }}" class="btn btn-info">Create Post</a>
    <form method="post" action="{{ route('posts.restore.all') }}" style="display: inline;">
        @csrf
        @method('put')
    <button type="submit" class="btn btn-success">Restore All Posts</button>
</form>

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Posted by</td>
            <td>Slug</td>
            <td>Actions</td>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->creator->name }}</td>
                <td>{{ $post->slug }}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                    <form method="post" action="{{ route('posts.destroy', $post->id) }}" style="display: inline-block;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $posts->links() }}
@endsection
