<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width">
   <title>Cloudinary Image Upload</title>
   <meta name="description" content="Prego is a project management app built for learning purposes">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="container" style="margin-top: 100px;">
   <div class="row">
       <h4 class="text-center">
           Upload Images
       </h4>

       <div class="row">
           <div id="formWrapper" class="col-md-4 col-md-offset-4">
               <form class="form-vertical" role="form" enctype="multipart/form-data" method="post" action="{{ route('uploadImage')  }}">
                   {{csrf_field()}}


                   {{-- IMAGEN UNO --}}
                   <div class="form-group{{ $errors->has('name1') ? ' has-error' : '' }}">
                       <input type="file" name="image_name1" class="form-control" id="name1" value="">
                       @if($errors->has('image_name1'))
                           <span class="help-block">{{ $errors->first('image_name1') }}</span>
                       @endif
                   </div>

                   {{-- IMAGEN DOS --}}
                   <div class="form-group{{ $errors->has('name2') ? ' has-error' : '' }}">
                       <input type="file" name="image_name2" class="form-control" id="name2" value="">
                       @if($errors->has('image_name2'))
                           <span class="help-block">{{ $errors->first('image_name2') }}</span>
                       @endif
                   </div>

                   {{-- IMAGEN TRES --}}
                   <div class="form-group{{ $errors->has('name3') ? ' has-error' : '' }}">
                       <input type="file" name="image_name3" class="form-control" id="name3" value="">
                       @if($errors->has('image_name3'))
                           <span class="help-block">{{ $errors->first('image_name3') }}</span>
                       @endif
                   </div>

                   {{-- IMAGEN CUATRO --}}
                   <div class="form-group{{ $errors->has('name4') ? ' has-error' : '' }}">
                       <input type="file" name="image_name4" class="form-control" id="name4" value="">
                       @if($errors->has('image_name4'))
                           <span class="help-block">{{ $errors->first('image_name4') }}</span>
                       @endif
                   </div>

                   <div class="form-group">
                       <button type="submit" class="btn btn-success">Upload Image </button>
                   </div>
               </form>
               <div class="row" id="displayImages">
                    {{-- @if($images) --}}
                        <div>
                            HOAFOAFJO
                        </div>
                        {{-- @foreach($images as $image)

                            <div class="col-md-3">
                                <a href="{{$image->image_url}}" target="_blank">
                                    <img src="{{asset('uploads/'.$image->image_name)}}" class="img-responsive" alt="{{$image->image_name}}">
                                </a>
                            </div>
                        @endforeach --}}
                    {{-- @endif --}}
                </div>

           </div>
       </div>
   </div>
</div>
</body>
</html>