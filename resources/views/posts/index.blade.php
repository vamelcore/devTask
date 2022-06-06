@extends('layout.app')

@section('title', 'Posts List')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Posts List</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Url</th>
            <th>Text</th>
            <th>Image</th>
            <th>Active</th>
            <th>Sort Order</th>
            <th></th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->url }}</td>
                <td>{{ $post->text }}</td>
                <td>{{ $post->image }}</td>
                <td>{{ $post->active }}</td>
                <td>{{ $post->sort_order }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
