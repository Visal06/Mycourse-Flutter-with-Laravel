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
@section('scripts')
    <script type="text/javascript">
        function showGallary(id) {
            $(".gallary" + id).toggle();
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatablesSimple').DataTable();
        });
    </script>
@endsection
