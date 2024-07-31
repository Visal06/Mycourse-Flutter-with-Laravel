@extends('layouts.master')

@section('content')
    <div class="container py-3">
        <h2>Post Details</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $post->content }}</h6>
                {{-- <p class="card-text">Posted by: {{ $post->user->name }}</p> --}}
                <br><br>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: inline;"
                    onsubmit="return confirm('Are you sure you want to delete this post?')">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
                <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm">Back to list</a>
            </div>
        </div>
    </div>
@endsection
