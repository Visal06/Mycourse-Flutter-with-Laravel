@extends('layouts.app')
@section('content')
<h2>Update AttributeValue</h2>
<hr/>
<form action="{{route('attributevalue.update',$data->id)}}" method="post">
@csrf
@method("PUT")
     <div class="form-group mb-2 {{ $errors->has('attribute_id') ? 'has-error' : ''}}">
          <label for="attribute_id">attribute_id :</label>
          <input type="text" value="{{$data->attribute_id}}" placeholder="attribute_id" name="attribute_id" id="attribute_id" class="form-control"/>
          @if($errors->has('attribute_id'))
             <span class='text-danger'>
               {{ $errors->first('attribute_id') }}
             </span>
          @endif
     </div>
     <div class="form-group mb-2">
          <label for="values">values :</label>
          <input type="text" value="{{$data->values}}" placeholder="values" name="values" id="values" class="form-control"/>
     </div>
     <input type="submit" class="btn btn-primary" value='Update'>
</form>
@endsection