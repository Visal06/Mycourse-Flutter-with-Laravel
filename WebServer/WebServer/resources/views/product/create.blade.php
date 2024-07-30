@extends('layouts.app')
@section('content')
<h2>Create Product</h2>
<hr/>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="row">
     <div class="col-md-4">
          <div class="form-group mb-2 {{ $errors->has('categoryid') ? 'has-error' : ''}}">
               <label for="categoryid">categoryid :</label>
               <select name="categoryid" id="categoryid" class="form-select">
                    @foreach ($cate as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
               </select>
     
               @if($errors->has('categoryid'))
                  <span class='text-danger'>
                    {{ $errors->first('categoryid') }}
                  </span>
               @endif
          </div>
          {{-- <div class="form-group mb-2 {{ $errors->has('attributevalueid') ? 'has-error' : ''}}">
               <label for="attributevalueid">attributevalueid :</label>
               <select name="attributevalueid" id="attributevalueid" class="form-select">
                    @foreach ($attval as $item)
                    <option value="{{$item->id}}">{{$item->values}}</option>
                    @endforeach
               </select>
               @if($errors->has('attributevalueid'))
                  <span class='text-danger'>
                    {{ $errors->first('attributevalueid') }}
                  </span>
               @endif
          </div> --}}
          <div class="form-group mb-2 {{ $errors->has('title') ? 'has-error' : ''}}">
               <label for="title">title :</label>
               <input type="text" value="{{old('title')}}" placeholder="title" name="title" id="title" class="form-control" />
               @if($errors->has('title'))
                  <span class='text-danger'>
                    {{ $errors->first('title') }}
                  </span>
               @endif
          </div>
          <div class="form-group mb-2 {{ $errors->has('images') ? 'has-error' : ''}}">
               <label for="images">images :</label>
               <input type="file" value="{{old('images')}}" placeholder="images" name="images" id="images" class="form-control" />
               @if($errors->has('images'))
                  <span class='text-danger'>
                    {{ $errors->first('images') }}
                  </span>
               @endif
          </div>
          <div class="form-group mb-2">
               <label for="images">images gallary :</label>
               <input type="file" value="{{old('proimage')}}" placeholder="proimage" id="proimage" class="form-control" name="proimage[]" multiple/>
              
          </div>

          <div class="form-group mb-2 {{ $errors->has('prices') ? 'has-error' : ''}}">
               <label for="prices">prices :</label>
               <input type="text" value="{{old('prices')}}" placeholder="prices" name="prices" id="prices" class="form-control" />
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
          <textarea rows="7" placeholder="description" name="description" id="description" class="form-control"></textarea>
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