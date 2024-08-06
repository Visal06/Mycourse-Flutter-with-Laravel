@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Adjust Slice</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('slice.update', $slice->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-12">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input class="form-control" id="price" type="text"
                                        placeholder="Enter your description" name="txtdescription"
                                        value="{{ $slice->description }}" />
                                    <label for="price">Description</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                            <img src="{{ asset('storage/' . $slice->image) }}" alt="{{ $slice->id }}" class="img-fluid"
                                style="max-width: 200px;">
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Update Slice</button>
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
@endsection
