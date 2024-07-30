@extends('layouts.app')
@section('content')
<a href="{{route('attributevalue.create')}}" class="btn btn-primary">Create</a>
<hr/>
<table class='table'>
     <thead>
          <tr>
               <th>attribute_id</th>
               <th>values</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $item)
          <tr>
               <td>{{ $item ->attribute->title }}</td>
               <td>{{ $item -> values }}</td>
               <td>
                    <a href="{{route('attributevalue.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('attributevalue.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection