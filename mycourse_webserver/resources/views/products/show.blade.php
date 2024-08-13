@extends('layouts.master')

@section('content')
    <div class="container py-3">
        <h2>Product Details</h2>
        <hr>
        <div class="card mb-2">
            <div class="card-body ">
                <h5 class="card-title">{{ $product->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">${{ $product->price }}</h6>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->id }}" class="img-fluid"
                    style="max-width: 250px;">
                {{-- <p class="card-text">Posted by: {{ $post->user->name }}</p> --}}
                <br><br>
                <hr>
                <a href="{{ route('mainpage') }}" class="btn btn-primary btn-sm">Back to dashboard</a>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#gallaryModal{{ $product->id }}">View
                    Gallary</a>
            </div>
        </div>
        <div class="modal fade" id="gallaryModal{{ $product->id }}" tabindex="-1" role="dialog"
            aria-labelledby="gallaryModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gallaryModalLabel{{ $product->id }}">Product
                            Gallery - {{ $product->name }}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach ($product->product_gallary as $gall)
                                <div class="col-md-3">
                                    <img src="{{ url('storage/' . $gall->image) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
