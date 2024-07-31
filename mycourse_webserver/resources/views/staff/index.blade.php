@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4 ">
        <h2 class="mt-4">STAFF INFORMATION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('staff.create') }}">Add New</a></li>


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
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Start-Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Position</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Start-Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($staff as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->sex }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>
                                    <form action="{{ route('staff.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this record?')">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('staff.edit', $item->id) }}"
                                            class="btn btn-primary btn-sm ">Edit</a>

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
