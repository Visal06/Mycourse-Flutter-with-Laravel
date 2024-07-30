@extends('layouts.app')
@section('content')
<h2>Update Product</h2>
<hr/>
<form action="{{route('product.update',$data->id)}}" method="post" method="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row">
     <div class="col-md-4">
          <div class="form-group mb-2 {{ $errors->has('categoryid') ? 'has-error' : ''}}">
               <label for="categoryid">categoryid :</label>
               <select name="categoryid" id="categoryid" class="form-select">
                    @foreach ($cate as $item)
                    <option value="{{$item->id}}" {{$item->id == $data->categoryid  ? 'selected' : ''}}>{{$item->title}}</option>
                    @endforeach
               </select>
     
               @if($errors->has('categoryid'))
                  <span class='text-danger'>
                    {{ $errors->first('categoryid') }}
                  </span>
               @endif
          </div>
          <div class="form-group mb-2 {{ $errors->has('title') ? 'has-error' : ''}}">
               <label for="title">title :</label>
               <input type="text" value="{{$data->title}}" placeholder="title" name="title" id="title" class="form-control" />
               @if($errors->has('title'))
                  <span class='text-danger'>
                    {{ $errors->first('title') }}
                  </span>
               @endif
          </div>
          <div class="form-group mb-2">
               <label for="images">Images :</label>
               <input type="file" value="" placeholder="images" name="images" id="images" class="form-control" />
          </div>
          <div class="form-group mb-2 {{ $errors->has('prices') ? 'has-error' : ''}}">
               <label for="prices">prices :</label>
               <input type="text" value="{{$data->prices}}" placeholder="prices" name="prices" id="prices" class="form-control" />
               @if($errors->has('prices'))
                  <span class='text-danger'>
                    {{ $errors->first('prices') }}
                  </span>
               @endif
          </div>
          <input type="submit" class="btn btn-primary" value='Save' />
     </div>
     <div class="col-md-8">
          
    
     <div class="form-group mb-2 {{ $errors->has('description') ? 'has-error' : ''}}">
          <label for="description">description :</label>
          <textarea rows="7" placeholder="description" name="description" id="description" class="form-control">{{$data->description}}</textarea>
          @if($errors->has('description'))
             <span class='text-danger'>
               {{ $errors->first('description') }}
             </span>
          @endif
     </div>
     </div>
</div>
</form>
@endsection
@section('scripts')
    <script type="text/javascript">

        tinymce.init({
            selector: 'textarea#description',
            forced_root_block: "div",
                height: 500,
                menubar: false,
                // Upload Image=======================================================================
                plugins: [
                    "advlist",  "lists","charmap", "preview",
                    "anchor", "searchreplace", "visualblocks", "fullscreen",
                    "insertdatetime", "media", "table", "code", "wordcount", "codesample", "code"
                ],
               toolbar: "blocks bold italic backcolor " +
                    "alignleft aligncenter alignright alignjustify " +
                    "bullist numlist outdent indent image removeformat codesample code",
               
               //  content_style: "body { font-family:Helvetica,Arial,sans-serif; font-size:14px }"
        });
    </script>
@endsection
