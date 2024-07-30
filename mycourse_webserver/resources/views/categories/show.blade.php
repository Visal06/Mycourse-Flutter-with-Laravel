@extends('layouts.master')

@section('content')
    <div class="container py-3">
        <h2>Category Details</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->txttitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $category->txtdescription }}</h6>
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->txttitle }}" class="img-fluid">
                <br><br>
                {{-- <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a> --}}
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;"
                    onsubmit="return confirm('Are you sure you want to delete this category?')">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('category.index') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>
    </div>
@endsection
