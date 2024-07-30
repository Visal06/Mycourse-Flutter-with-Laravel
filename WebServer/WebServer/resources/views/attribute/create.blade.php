@extends('layouts.app')
@section('content')
<h2>Create Attribute</h2>
<hr/>
<form action="{{route('attribute.store')}}" method="post">
@csrf
     <div class="form-group mb-2 {{ $errors->has('title') ? 'has-error' : ''}}">
          <label for="title">title :</label>
          <input type="text" value="{{old('title')}}" placeholder="title" name="title" id="title" class="form-control" />
          @if($errors->has('title'))
             <span class='text-danger'>
               {{ $errors->first('title') }}
             </span>
          @endif
     </div>
     <input type="submit" class="btn btn-primary" value='Save' />
</form>
@endsection