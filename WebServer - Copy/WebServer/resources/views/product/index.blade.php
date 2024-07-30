@extends('layouts.app')
@section('content')
<a href="{{route('product.create')}}" class="btn btn-primary">Create</a>
<hr/>
<table class='table'>
     <thead>
          <tr>
               <th>Id</th>
               <th>categoryid</th>
               <th>attributevalueid</th>
               <th>title</th>
               <th>images</th>
               <th>prices</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $item)
          <tr>
               <td>{{ $item -> id }}</td>
               <td>{{ $item -> categoryid }}</td>
               <td>{{ $item -> attributevalueid }}</td>
               <td>{{ $item -> title }}</td>
               <td>
                    <img src="{{ url('storage/'.$item->images) }}" width="60">
               </td>
               <td>{{ $item -> prices }}</td>
               <td>
                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('product.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection