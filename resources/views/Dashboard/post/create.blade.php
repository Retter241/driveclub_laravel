@extends('Dashboard.layouts.app')

@push('styles')
 

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>

<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script -->
<style>
    .file-caption-main{
        display: none;
        visibility: hidden;
    }
</style>
@endpush


@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Создать Новость</h2>
        </div>
        <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('post.index') }}"> Назад</a>
        </div>
   </div>


      <!-- need add -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Упс!</strong> Проблемы с заполнением.<br><br>
    <ul>{{--  $errors->messages() --}}
      @foreach ( $errors->all() as $error) 
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
   <!-- need add -->

   @php
    $user_id = Auth::user()->id;
    @endphp



<div class="row "   style="width:100%;justify-content: space-between;"> 
        {!! Form::open(array('action' => 'PostController@store', 'files'=> true , 'method' => 'post')) !!}

    <div class="col-xs-6 col-sm-6 col-md-6">

        <div class="form-group ">
               {!! Form::label('author', 'author id') !!}  
                {!! Form::text('author', $user_id, ['class' => 'form-control' , 'placeholder' => 'author' , 'disabled' => true]) !!}
        </div>
    </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
             {!! Form::label('img', 'Превью') !!}  <br/>
                 {!! Form::file('image') !!}  
        </div>
    </div><div class="clearfix"></div>
   
            <div class="form-group">
               {!! Form::label('meta_title', 'Заголовок') !!}  
                {!! Form::text('meta_title', null, ['class' => 'form-control' , 'placeholder' => 'meta_title']) !!}
           

                {!! Form::label('meta_desc', 'Описание (СЕО)') !!}  
                {!! Form::text('meta_desc', null, ['class' => 'form-control' , 'placeholder' => 'meta_desc']) !!}
   

                </div>
                <div class="form-group ">
 <div class="col-xs-6 col-sm-6 col-md-6" style="padding-left: 0;">
                {!! Form::label('title', 'title', ['style'=> 'display:none;']) !!}  
                {!! Form::text('title', null, ['class' => 'form-control' , 'placeholder' => 'title' , 'style'=> 'display:none;']) !!}

               <label for="category">Категория</label><br>
                          <select name="category" id="category" class="custom-select custom-select-md">
                @foreach ($categories as $key => $category)
                
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                 

                    
                @endforeach 
            </select> 
        </div>
         <div class="col-xs-6 col-sm-6 col-md-6" style="padding-right: 0;">

                 {!! Form::label('alias', 'Алиас') !!}  
                {!! Form::text('alias', null, ['class' => 'form-control' , 'placeholder' => 'alias']) !!}
                </div>
            </div>




                  <div class="form-group ">
                         {!! Form::label('content', 'Контент') !!}  
                {!! Form::textarea('content', null, ['class' => 'form-control' , 'placeholder' => 'content' , 'id'=> 'visual_editor']) !!}
                  </div>

<div class="file-loading">
    <input id="slider" name="slider[]" multiple type="file" class="file"/>
</div>




 <div class="form-group "> 
                {!! Form::submit('Создать' , ['class'=> 'btn btn-primary']) !!}   
    </div>
     {!! Form::close() !!}

</div>





    </div>
</div>

@push('scripts')



    <script type="text/javascript">



      $(document).on('load', function() {
    $("#slider").fileinput({
        uploadUrl: '{{ route('multiupload') }}'
    });





});
    </script>
     
@endpush
@endsection

