@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-1 rounded-lg mt-3">
                <div class="card-header">
                    <h5 class="font-weight-light my-2">Create New Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return confirm('Are you sure you want to create this Product?')">
                        @csrf



                        <div class="row mb-12">
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="notedate" type="date"
                                        placeholder="Select register date" name="txtdate"
                                        value="{{ now()->format('Y-d-m') }}" />
                                    <label for="notedate">Register-Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="txtcategory_id" name="txtcategory_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" type="text"
                                        placeholder="Enter Product Name" name="txtname" required />
                                    <label for="name">Product-Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="qty" type="number" placeholder="Enter QTY"
                                        name="txtquantity" required />
                                    <label for="qty">QTY</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-12">

                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="price" type="number" placeholder="Enter Price"
                                        name="txtprice" required />
                                    <label for="price">Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" type="number" placeholder="Enter Amount"
                                        name="txtamount" required />
                                    <label for="name">Product-Amount</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="totalprice" type="number" placeholder="Total Price"
                                        name="txttotalprice" required />
                                    <label for="totalprice">Total Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="status" name="txtstatus" required>
                                        <option value="">Product Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row mb-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="image">Product</label> --}}
                                    <small class="form-text text-muted">Please select a product image (JPEG, PNG,
                                        GIF)</small>
                                    <input type="file" class="form-control" id="image" name="image">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{-- <label for="image">Gallary</label> --}}
                                    <small class="form-text text-muted">Please select multiple product gallary (JPEG, PNG,
                                        GIF)</small>
                                    <input type="file" class="form-control" id="image" name="gallary_image[]"
                                        multiple>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mb-2 {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">Description :</label>
                            @if ($errors->has('description'))
                                <span class='text-danger'>
                                    {{ $errors->first('description') }}
                                </span>
                            @endif
                            <textarea rows="7" placeholder="Please insert your description....." name="description" id="description"
                                class="form-control"></textarea>

                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Create Product</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('product.index') }}">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection()

@section('scripts')
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#description',
            forced_root_block: "div",
            height: 500,
            menubar: false,
            // Upload Image === === === === === === === === === === === === === === === === === === === === === === ===

            plugins: [
                "advlist", "lists", "charmap", "preview",
                "anchor", "searchreplace", "visualblocks", "fullscreen",
                "insertdatetime", "media", "table", "code", "wordcount", "codesample", "code"
            ],
            toolbar: "blocks bold italic backcolor " +
                "alignleft aligncenter alignright alignjustify " +
                "bullist numlist outdent indent image removeformat codesample code",

            content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:16px }"
        });
    </script>
@endsection
