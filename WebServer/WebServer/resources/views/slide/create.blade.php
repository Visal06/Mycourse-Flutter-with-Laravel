@extends('layouts.app')
@section('content')
<h2>Create Slide</h2>
<hr/>
<form action="{{route('slide.store')}}" method="post" enctype="multipart/form-data">
@csrf
     <div class="form-group mb-2 {{ $errors->has('slideurl') ? 'has-error' : ''}}">
          <label for="slideurl">slideurl :</label>
          <input type="file" value="{{old('slideurl')}}" placeholder="slideurl" name="slideurl" id="slideurl" class="form-control" />
          @if($errors->has('slideurl'))
             <span class='text-danger'>
               {{ $errors->first('slideurl') }}
             </span>
          @endif
     </div>
     <input type="submit" class="btn btn-primary" value='Save' />
</form>
@endsection