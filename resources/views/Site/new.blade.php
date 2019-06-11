@extends('site.layouts.app')

@section('content')


               @include('site.layouts.menu')


    <!--
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
     -->
    <!--<span>id: {{ $post->id }}</span><br><hr><br>
    <span>Превью: <img src="{{ config('app.url')}}/{{ $post->img }}"> </span><br><hr><br>
    <span>Заголовок: </span><br><hr><br>
    <span>Описание: {{ $post->meta_desc }}</span><br><hr><br>
    <span>Алиас: {{ $post->alias }}</span><br><hr><br>
    <span>Автор {{ App\User::find($post->author)->name}}</span><br><hr><br>
    <span>Просмотры {{ $post->view_count }}</span><br><hr><br>
    <span>Контент {!! $post->content !!}</span><br><hr><br>-->
      
    <div class="container post-details-title-area bg-overlay clearfix" style="background-image: url({{ config('app.url')}}/{{ $post->img }})">
        <div class="container">
            <div class="row h-100 align-items-center text-left">
                <div class="col-12 col-lg-8">
                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="tag">
                            <span><a href="{{ action('Site\SiteController@getAllByCategory' , App\Category::find($post->category_id)->alias) }}" style="    position: absolute;
    width: 100%;
    left: 0;
    font-size: 14px;
    font-weight: 700;
    line-height: 45px;color:#fff;
    text-transform: uppercase;">{{ App\Category::find($post->category_id)->name}}</a></span></p>
                        <p class="post-title">{{ $post->meta_title }}</p>
                        <div class="d-flex align-items-center">
                            <span class="post-date mr-30">{{ $post->created_at->format('d.m.Y') }}</span>
                            <span class="post-date mr-30">{{ App\User::find($post->author)->name}}</span>
                            <span class="post-date"><img style="width: 20px; padding-right:5px; margin-bottom: 2px;" src="\public\dashboards\image\dashboard.png" />{{ $post->view_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="post-news-area">
        <div class="container">
            <div class="row justify-content-center text-left">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content">
                    {!! $post->content !!}
</div>


{{-- Part for the form to add comment ( !use Auth middlware AND  $post->id) --}}
<div class="post-a-comment-area clearfix">
<h4 class="mb-10">Обсуждение</h4>
<div class="contact-form-area">
    @if (Auth::check())

    @can('comment-create')
   
                     {!! Form::open(array('action'=>'Site\SiteController@addCommentPost', 'method' => 'POST')) !!}
         
                        <div class="form-group">
                                 {!! Form::text('comment_body', '', ['class' => 'form-control' , 'name' => 'comment_body', 'placeholder' => 'Комментарий']) !!}

                                {!! Form::text('parent_id', 0, ['class' => 'form-control' , 'placeholder' => 'parent_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}

                                 {!! Form::text('post_id', $post->id, ['class' => 'form-control' , 'placeholder' => 'post_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
</div>
                        <div class="form-group">
                            {!! Form::submit('Добавить' ,['class'=>'btn']) !!}
                        </div>
                    {!! Form::close() !!}
                     @endcan
 @else 
 Для комментирования необходимо Войти или зарегистрироваться
@endif
<hr>
                    <div class="comment_area clearfix">
                        <ol>
                            <!-- Single Comment Area -->
                            @foreach ($comments as $key => $comment)
                            <li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a href="{{ action('Site\SiteController@getUserItem' , App\User::find($comment->user_id)->id) }}" class="post-author">{{ App\User::find($comment->user_id)->name}}</a>
                                            <a href="#" class="post-date">June 23, 2018 </a>
                                        </div>
                                        <p>{{ $comment->body }}</p>
                                    </div>
                                </div>
</li>
                                @endforeach
                            
</div>
</div>
</div>

                             

</div>
@include('site.layouts.saidbar')
</div>
</div>
</section>
@endsection