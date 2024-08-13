@extends('layouts.master')

@section('content')
    <div class="container py-3">
        <h2>Slice Details</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $slice->description }}</h5>
                {{-- <h6 class="card-subtitle mb-2 text-muted">{{ $category->description }}</h6> --}}
                <img src="{{ asset('storage/' . $slice->image) }}" alt="{{ $slice->id }}" class="img-fluid"
                    style="max-width: 250px;">
                <br><br>
                <a href="{{ route('mainpage') }}" class="btn btn-primary">Back to dashboard</a>
            </div>
        </div>
    </div>
@endsection
