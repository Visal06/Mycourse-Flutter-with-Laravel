@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Create Post</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.store') }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to create this post?')">
                        @csrf

                        <div class="row mb-12">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="phone" type="text"
                                        placeholder="Enter Post's title" name="txttitle" required />
                                    <label for="title">Post's Title</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter Post's content" name="txtcontent" required />
                                    <label for="content">Post Content</label>
                                </div>
                            </div>

                        </div>

                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{ route('post.index') }}">Back to list</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection()
