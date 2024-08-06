@extends('layouts.master')

@section('content')
    <div class="container py-3">
        <h2>Slice Details</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $slice->description }}</h5>
                {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $category->description }}</h6> --}}
                <img src="{{ asset('storage/' . $slice->image) }}" alt="{{ $slice->id }}" class="img-fluid">
                <br><br>
                <a href="{{ route('slice.edit', $slice->id) }}" class="btn btn-warning">Edit</a>

                <form action="{{ route('slice.destroy', $slice->id) }}" method="POST" style="display: inline;"
                    onsubmit="return confirm('Are you sure you want to delete this purchase?')">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('slice.index') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>
    </div>
@endsection
