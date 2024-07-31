@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4 ">
        <h2 class="mt-4">POST INFORMATION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('post.create') }}">Add New</a></li>


        </ol>
        <div class="card mb-4">

        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>content</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>

                                <td>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
