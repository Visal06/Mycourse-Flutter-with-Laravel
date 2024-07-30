@extends('layouts.app')
@section('content')
<h2>Update Slide</h2>
<hr/>
<form action="{{route('slide.update',$data->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method("PUT")
     <div class="form-group mb-2">
          <label for="slideurl">slideurl :</label>
          <input type="file" value="" placeholder="slideurl" name="slideurl" id="slideurl" class="form-control"/>
     </div>
     <input type="submit" class="btn btn-primary" value='Update'>
</form>
@endsection