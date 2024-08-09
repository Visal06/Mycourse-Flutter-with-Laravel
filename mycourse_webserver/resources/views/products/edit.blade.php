@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create New Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="post" method="post"
                        enctype="multipart/form-data"
                        onsubmit="return confirm('Are you sure you want to adjust this Product?')">
                        @csrf
                        @method('PUT')

                        <div class="row mb-12">
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="notedate" type="date"
                                        placeholder="Select register date" name="txtdate"
                                        value="{{ old('date', $product->notedate) }}" required />
                                    <label for="notedate">Register-Date</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="txtcategory_id" name="txtcategory_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($cate as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" type="text"
                                        placeholder="Enter Product Name" name="txtname" value="{{ $product->name }}"
                                        required />
                                    <label for="name">Product-Name</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="qty" type="number" placeholder="Enter QTY"
                                        name="txtquantity" value="{{ $product->qty }}" required />
                                    <label for="qty">QTY</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mb-12">

                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="price" type="number" placeholder="Enter Price"
                                        name="txtprice" value="{{ $product->price }}" required />
                                    <label for="price">Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="name" type="number" placeholder="Enter Amount"
                                        name="txtamount" value="{{ $product->amount }}" required />
                                    <label for="name">Product-Amount</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="totalprice" type="number" placeholder="Total Price"
                                        name="txttotalprice" value="{{ $product->totalprice }}" required />
                                    <label for="totalprice">Total Price</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select" id="status" name="txtstatus">
                                        <option value="">Select Status</option>
                                        <option value="Active"
                                            {{ old('txtstatus', $product->status) == 'Active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="Inactive"
                                            {{ old('txtstatus', $product->status) == 'Inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                        <option value="Pending"
                                            {{ old('txtstatus', $product->status) == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
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
                        <div class="row mb-12">
                            <div class="form-group text-center">

                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid" style="max-width: 150px;">
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
                                class="form-control">{{ $product->description }}</textarea>

                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Adjust Product</button>
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
