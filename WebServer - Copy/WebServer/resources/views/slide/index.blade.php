@extends('layouts.app')
@section('content')
<a href="{{route('slide.create')}}" class="btn btn-primary">Create</a>
<hr/>
<table class='table'>
     <thead>
          <tr>
               <th>slideurl</th>
               <th>orderitem</th>
               <th>Action</th>
          </tr>
     </thead>
     <tbody>
          @foreach($data as $item)
          <tr>
               <td>{{ $item -> slideurl }}</td>
               <td>{{ $item -> orderitem }}</td>
               <td>
                    <a href="{{route('slide.edit',$item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{route('slide.delete',$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
               </td>
          </tr>
          @endforeach
     </tbody>
</table>
@endsection