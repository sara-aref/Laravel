
@extends('layouts.app')

@section("content")

<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Created At</td>
        <td>Updated At</td>
        <td>Actions</td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">View</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
