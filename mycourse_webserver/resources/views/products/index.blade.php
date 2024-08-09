@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4 ">
        <h2 class="mt-4">Prodcut INFORMATION</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('product.create') }}">Add New</a></li>


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
                                <td>{{ $product->name }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>${{ $product->totalprice }}</td>
                                <td>
                                    <img src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="img-thumbnail" style="max-width: 61px;">
                                </td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>

                                        @if ($product->image && Storage::exists($product->image))
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
