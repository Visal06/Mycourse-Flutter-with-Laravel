@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4 ">
        <h2 class="mt-4">Slice INFORMATION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('slice.create') }}">Add New</a></li>


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
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($slices as $slice)
                            <tr>
                                <td>{{ $slice->id }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $slice->image) }}" alt="{{ $slice->id }}"
                                        class="img-thumbnail" style="max-width: 100px;">
                                </td>
                                <td>{{ $slice->description }}</td>
                                <td>
                                    <form action="{{ route('slice.destroy', $slice->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this slice?')">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('slice.edit', $slice->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>

                                        @if ($slice->image && Storage::exists($slice->image))
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                                        @endif

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
