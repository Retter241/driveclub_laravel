@extends('dashboard.layouts.app')


@push('styles')
 {{--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"></link> --}}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
<script type="text/javascript">
  
</script>
<style type="text/css">
    .file-caption-main{
        display: none;
        visibility: hidden;
    }
      .toggler {
        transition: all .3s linear;
        display: inline-block;
        width: 100%;
        /*height: 37px;*/
        /*overflow: hidden;*/
    }
</style>

@endpush


@section('content')
<style type="text/css">
    .cke_editable img,  {
        max-width: 250px;
    }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редактирование проекта</div>

                <div class="card-body d-none">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @php
    $user_id = Auth::user()->id;
    @endphp

    <div class="row "> 
        {!! Form::open(array( 'files'=> true , 'method' => 'post')) !!}
        <div class="form-group col-md-5 d-none">
               {!! Form::label('author', 'author id') !!}  
                {!! Form::text('author', $user_id, ['class' => 'form-control' , 'placeholder' => 'author' , 'disabled' => true]) !!}

{!! Form::hidden('id', $project->id) !!}
               


        </div>
        <div class=" col-md-2"></div>
        <div class="form-group col-md-5">
             {!! Form::label('img', 'Превью') !!}  
                 {!! Form::file('image') !!}  
        </div>
        <div class="form-group col">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="<img class='img-responsive' src='{{ config('app.url') }}/{{ $project->img }}' width='175' height='75'  />">Картинка для превью</a>
        </div>
            <div class="form-group  col-md-6">
               {!! Form::label('meta_title', 'Заголовок') !!}  
                {!! Form::text('meta_title', $project->meta_title, ['class' => 'form-control' , 'placeholder' => 'meta_title']) !!}


           

                {!! Form::label('meta_desc', 'Описание (СЕО)') !!}  
                {!! Form::text('meta_desc', $project->meta_desc, ['class' => 'form-control' , 'placeholder' => 'meta_desc']) !!}
   
 
                </div>
                <div class="form-group  col-md-6" style="margin-bottom: 95px;">
                    <label class="d-none" for="category">Категория</label>
                          <select name="category" id="category" class="custom-select custom-select-md d-none">
                @foreach ($categories as $key => $category)
                    @if ($project->category_id == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif

                    
                @endforeach 
            </select>

                {!! Form::label('title', 'title' , ['style'=> 'display:none;']) !!}  
                {!! Form::text('title', $project->title, ['class' => 'form-control' , 'placeholder' => 'title' ,'style'=> 'display:none;']) !!}

                 {!! Form::label('alias', 'Алиас') !!}  
                {!! Form::text('alias', $project->alias, ['class' => 'form-control' , 'placeholder' => 'alias']) !!}
                </div>

                  <div class="form-group ">
                         {!! Form::label('content', 'Контент') !!}  
                {!! Form::textarea('content', $project->content, ['class' => 'form-control' , 'placeholder' => 'content' , 'id'=> 'visual_editor']) !!}
                  </div>
 <div class="form-group ">
@php
 $sliders = json_decode($project->slider_photo, true);
@endphp
    @if(is_null($sliders))
        Slider is Empty!
    @else 
        @foreach($sliders as $slide)
             <a href="#" data-toggle="tooltip" data-placement="bottom" title="<img class='img-responsive' src='/{{ $slide }}' width='175' height='75'  />">Изображение слайдера - </a>
        @endforeach
        
    @endif
 </div>
  <div class="form-group toggler">
   
        <div class="file-loading">
            <input id="slider" name="slider[]" multiple type="file" class="file"/>
        </div>
  </div>





        
                {!! Form::submit('Обновить' ,['id'=>'updaterFormPost' , 'class' => 'btn btn-success']) !!}
{!! Form::close() !!}
                <hr>
                <hr>
                <hr>
<!-- Include form comment ! USE $post ->id -->
          {{-- @include('dashboard.comment.addform') --}} 
<!-- Include form comment -->




    </div>
</div>


{{-- 
<!-- Multiuload Start -->
<div class="container">
    <div class="row">
         {!! Form::open(array(
          'files'=> true , 
          'method' => 'post', 
          'id'=>'ajax_m',
          'route' =>'multiupload'
          )) !!}


{!! Form::close() !!}
    </div>
</div>
    
<!-- Multiuload End -->
 --}}


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


