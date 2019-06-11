@extends('Dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width:100%;">
       
   <div class="row"  style="width:100%;justify-content: space-between;">
       <div class="pull-left">
            <h2>Просмотр проекта</h2>
        </div>
        <div class="pull-right">
             <a class="btn btn-primary" href="{{ route('project.index') }}">Назад</a>
        </div>
   </div>
              
 <div class="row" style="width: 100%;">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Заголовок: </strong>
            {{ $project->meta_title }}  (id: {{ $project->id }})
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Картинка: </strong>
              <img src="{{ $project->img }}" style="width: 150px" alt="">
         </div>
     </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Категория:</strong>
            {{ $category->name }} ( id: {{ $project->category_id }} )
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
             <strong>Слайдер: </strong><br>

             @php
                 $slider = json_decode($project->slider_photo , true);
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
         {!! $project->content !!}
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
            {{ $project->view_count }}
        </div>
    </div>
</div>
<br>
<br>
<br>
       <!-- <h4>Add comment</h4>
        {!! Form::open(array('route'=>'addcompr', 'method' => 'POST')) !!}

        <div class="form-group">
            {!! Form::text('comment_body', '', ['class' => 'form-control' , 'name' => 'comment_body']) !!}

            {!! Form::text('parent_id', 0, ['class' => 'form-control' , 'placeholder' => 'parent_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}

            {!! Form::text('project_id', $project->id, ['class' => 'form-control' , 'placeholder' => 'post_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Comment' ,['class'=>'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!} -->
    <div class="container">
    <h4>Комментарии к проекту:</h4>
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
