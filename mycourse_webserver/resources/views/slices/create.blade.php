@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create New Slice</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('slice.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return confirm('Are you sure you want to create this slice?')">
                        @csrf
                        <div class="row mb-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
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
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Create Slice</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('slice.index') }}">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection()
