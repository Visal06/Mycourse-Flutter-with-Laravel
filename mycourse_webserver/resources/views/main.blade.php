@extends('layouts.master')

@section('content')
    <div class="col-md-12">
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
        <div class="row">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Register-Date</th>
                            <th>Category</th>
                            <th>Product-Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Total-Amount</th>
                            <th>Total-Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Register-Date</th>
                            <th>Category</th>
                            <th>Product-Name</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Total-Amount</th>
                            <th>Total-Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->notedate }}</td>
                                <td>{{ $product->categories->title }}</td>
                                <td onclick="showGallary({{ $product->id }})" style="color: green; cursor: pointer;">
                                    {{ $product->name }}
                                </td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>${{ $product->totalprice }}</td>
                                <td>
                                    <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" class="img-thumbnail"
                                        style="max-width: 61px;">
                                </td>
                                <td>
                                    @if ($product->status == 'Active')
                                        <form class="d-flex align-items-center justify-content-center">
                                            @csrf
                                            <button class="btn btn-success btn-sm text-center">Activate</button>
                                        </form>
                                    @elseif ($product->status == 'Inactive')
                                        <form class="text-center">
                                            @csrf
                                            <button class="btn btn-secondary btn-sm text-center">Inactive</button>
                                        </form>
                                    @else
                                        <form class="text-center">
                                            @csrf
                                            <button class="btn btn-warning btn-sm text-center">Pending</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')"
                                        class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#gallaryModal{{ $product->id }}">Gallary</a>
                                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Add</a>
                                        {{-- <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a> --}}
                                        {{--
                                        @if ($product->image && Storage::exists($product->image))
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                                        @endif --}}

                                    </form>
                                </td>
                            </tr>

                            <!-- Create a modal for each product -->
                            <div class="modal fade" id="gallaryModal{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="gallaryModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="gallaryModalLabel{{ $product->id }}">Product
                                                Gallery - {{ $product->name }}</h5>
                                            {{-- <button type="button" class="close btn btn-danger" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> --}}
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach ($product->product_gallary as $gall)
                                                    <div class="col-md-3">
                                                        <img src="{{ url('storage/' . $gall->image) }}"
                                                            alt="{{ $product->name }}" class="img-thumbnail">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
