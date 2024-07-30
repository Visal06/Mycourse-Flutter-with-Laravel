@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create New Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-12">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="item_name" type="text"
                                        placeholder="Enter your item name" name="txttitle" required />
                                    <label for="item_name">Title Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="price" type="text"
                                        placeholder="Enter Description" name="txtdescription" />
                                    <label for="price">Description</label>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                            </div>
                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Create Category</button>
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
@endsection()
