@extends('layouts.app')
@section('content')
<a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
<hr/>
<table class='table'>
     <thead>
          <tr>
               <th>title</th>
               <th>image</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $item)
          <tr>
               <td>{{ $item -> title }}</td>
               <td>{{ $item -> image }}</td>
               <td>
                    <a href="{{route('category.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection