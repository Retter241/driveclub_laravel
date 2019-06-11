@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Просмотр новости</h2>
        </div>
        <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('post.index') }}">Назад</a>
        </div>
   </div>
              
 <div class="row" style="width: 100%;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Заголовок: </strong>
            {{ $post->meta_title }}  (id: {{ $post->id }})
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Категория:</strong>
            {{ $category->name }} ( id: {{ $post->category_id }} )
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Слайдер: </strong><br>

             @php
                 $slider = json_decode($post->slider_photo , true);
                 $i = 0;
             @endphp
             @if(is_null($slider))
                 Slider is Empty!
             @else
                 @foreach($slider as $item)

                     {{   $i++ }} - <img src="/{{ $item  }}" style="height: 50px;" alt="">
                 @endforeach
             @endif
         </div>
     </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Контент: </strong><br>
<div class="container">
    <div class="row content">
         {!! $post->content !!}
    </div>
</div>
           
          
        </div>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Просмотров:</strong>
            {{ $post->view_count }}
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container">
    <h4>Комментарии к новости:</h4>
 <div class="row">
      @foreach ($comments as $key => $comment)
         <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID Пользователя: {{ $comment->user_id }}</strong><br>
            <strong>Текст: {{ $comment->body }}</strong><br>
          
        </div>
        </div>
            @endforeach
    </div>
 </div>
</div>


{{--- dd($comments) --}}

    </div>
</div>
@endsection
