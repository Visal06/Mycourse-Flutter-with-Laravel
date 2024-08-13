@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <br>
        <hr>
        <div class="row">

            <h5> Top 6 Product Information</h5>
            <div class="card product-card px-2 text-center">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-2">
                            <div class="card mb-2">
                                <img src="{{ $product->imageurl }}" class="card-img-top mx-auto" alt="{{ $product->name }}"
                                    class="img-fluid " style="max-width: 120px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
        <hr>
        <h5>Top 6 Slice Information</h5>
        <div class="row">
            <div class="card product-card px-2 text-center">
                <div class="row">
                    @foreach ($slices as $slice)
                        <div class="col-md-2">
                            <div class="card mb-2">
                                <img src="{{ $slice->imageurl }}" class="card-img-top mx-auto" alt="{{ $slice->id }}"
                                    class="img-fluid " style="max-width: 120px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $slice->description }}</h5>
                                    {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                    <a href="{{ route('slice.show', $slice->id) }}" class="btn btn-primary">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
@endsection
