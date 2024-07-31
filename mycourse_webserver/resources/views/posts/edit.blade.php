@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Adjust Post</h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('post.update', $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to update this post?')">
                        @csrf
                        @method('PUT')
                        <div class="row md-12">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter Post's title" name="txttitle" value="{{ $post->title }}" />
                                    <label for="title">Post title</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="content" type="text" placeholder="Post content"
                                        name="txtcontent" value="{{ $post->content }}" />
                                    <label for="content">Post content</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
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
