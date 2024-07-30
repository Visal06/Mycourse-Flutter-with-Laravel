@extends('layouts.app')
@section('content')
<h2>Create AttributeValue</h2>
<hr/>
<form action="{{route('attributevalue.store')}}" method="post">
@csrf
     <div class="form-group mb-2 {{ $errors->has('attribute_id') ? 'has-error' : ''}}">
          <label for="attribute_id">attribute_id :</label>
          <select name="attribute_id" id="attribute_id" class="form-select">
               @foreach ($data as $item)
               <option value="{{$item->id}}">{{$item->title}}</option>
               @endforeach
          </select>
          @if($errors->has('attribute_id'))
             <span class='text-danger'>
               {{ $errors->first('attribute_id') }}
             </span>
          @endif
     </div>
     <div class="form-group mb-2">
          <label for="values">values :</label>
          <input type="text" value="{{old('values')}}" placeholder="values" name="values" id="values" class="form-control" />
     </div>
     <input type="submit" class="btn btn-primary" value='Save' />
</form>
@endsection