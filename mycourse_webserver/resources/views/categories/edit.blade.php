@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Adjust Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="item_name" type="text"
                                        placeholder="Enter your first name" name="txttitle"
                                        value="{{ $category->title }}" />
                                    <label for="item_name">title Name</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input class="form-control" id="price" type="text"
                                        placeholder="Enter your last name" name="txtdescription"
                                        value="{{ $category->description }}" />
                                    <label for="price">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->title }}"
                                class="img-fluid" style="max-width: 200px;">
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('category.index') }}">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
