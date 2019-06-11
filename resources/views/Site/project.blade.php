@extends('site.layouts.app')

@section('content')


@include('site.layouts.menu')

<!--<h3>Проект </h3>
    <span>slider:</span><br><hr><br>
  @php
      $slider = json_decode($project->slider_photo , true);
      $i = 0;
  @endphp
    @if(is_null($slider))
        Slider is Empty!
    @else
    <div class="owl-carousel owl-theme">
        @foreach($slider as $item)

        <div class="item"> {{   $i++ }} - <img src="/{{ $item  }}" style="height: 50px;" alt=""> </div>
        @endforeach
        </div>
    @endif
  
    <span>id: {{ $project->id }}</span><br><hr><br>
    <span>Превью: <img src="{{ config('app.url')}}/{{ $project->img }}"> </span><br><hr><br>
    <span>Заголовок: {{ $project->meta_title }}</span><br><hr><br>
    <span>Описание: {{ $project->meta_desc }}</span><br><hr><br>
    <span>Алиас: {{ $project->alias }}</span><br><hr><br>
    <span>Автор {{ App\User::find($project->author)->name}}</span><br><hr><br>
    <span>Просмотры {{ $project->view_count }}</span><br><hr><br>
    <span>Контент {!! $project->content !!}</span><br><hr><br> -->


{{--
    @if(Auth::id() > 0)
}
}

@if($is_follow)
<a href="{{ route('user.unfollow' , $user->id)}}">Отписаться</a>
@elseif(Auth::id() == $user->id)
@else
 <a href="{{ route('user.follow' , $user->id)}}">Подписаться</a>
@endif


@endif  --}}

<div class=" container post-details-title-area bg-overlay clearfix"
    style="background-image: url({{ config('app.url')}}/{{ $project->img }})">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center text-left">
            <div class="col-12 col-lg-8">
                <!-- Post Content -->
                <div class="post-content">
                    <p class="tag"><span>Проект</span></p>
@if(Auth::id() > 0)
@if($is_follow)
 <p class="tag"><a href="{{ route('user.unfollow' , $project->author)}}" ><span>Отписаться</span></a></p>
@elseif(Auth::id() == $project->author)
@else
  <p class="tag"><a href="{{ route('user.follow' , $project->author)}}"><span>Подписаться</span></a></p>
@endif
                   

@endif

                    <p class="post-title">{{ $project->meta_title }}</p>
                    <div class="d-flex align-items-center">
                        <span class="post-date mr-30">{{ $project->created_at->format('d.m.Y') }}</span>
                        <span class="post-date mr-30">{{ App\User::find($project->author)->name}}</span>
                        <span class="post-date mr-30"><img style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                src="\public\dashboards\image\dashboard.png" />{{ $project->view_count }}</span>
                        <span class="post-date"><img style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                src="\public\dashboards\image\fire.png" /><span id="countLikes">{{ count($project->likes) }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="post-news-area mb-70">
    <div class="container">
        <div class="row justify-content-center text-left">
            <!-- Post Details Content Area -->
            <div class="col-12 col-lg-8">
                <div class="post-details-content">
                    @php
                    $slider = json_decode($project->slider_photo , true);
                    $i = 0;
                    @endphp
                    @if(is_null($slider))
                    Slider is Empty!
                    @else

                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($slider as $item)
                            <div class="carousel-item"><img class="img-fluid" src="/{{ $item  }}" width="100%" alt="">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Предыдущий</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Следующий</span>
                        </a>
                    </div>

                    @endif
                    {!! $project->content !!}
                    {{--
  @foreach ($project->likes as $like)

    {{ $like->name }} likes this ! <br>
    

    @endforeach
    --}}
  




     @if(!\App\Like::where('user_id' , Auth::id())->where('likeable_id',$project->id)->get()->isEmpty())
      
       <span class="like-btn"> <a href="{{ route('project.like' , $project->id) }}" class="likable">Убрать лайк</a> </span>
        @else
        <span class="like-btn"> <img style="width: 20px; padding-right:5px; margin-bottom: 2px;" src="\public\dashboards\image\fire.png" />  <a href="{{ route('project.like' , $project->id) }}" class="likable">Нравится</a> </span>
        @endif
                </div>


                @if (Auth::check())

                {{-- Part for the form to add comment ( !use Auth middlware AND  $project->id) --}}
                <div class="post-a-comment-area mb-30 clearfix">
                    <h4 class="mb-10">Обсуждение</h4>
                    <div class="contact-form-area">
                        {!! Form::open(array('action'=>'Site\SiteController@addCommentProject', 'method' => 'POST' , 'id'=>'comment_form')) !!}

                        <div class="form-group">
                            {!! Form::text('comment_body', '', ['class' => 'form-control' , 'name' => 'comment_body'])
                            !!}

                            {!! Form::text('parent_id', 0, ['class' => 'form-control' , 'placeholder' => 'parent_id' ,
                            'type' => 'hidden' , 'style'=> 'display:none']) !!}

                            {!! Form::text('project_id', $project->id, ['class' => 'form-control' , 'placeholder' =>
                            'post_id' , 'type' => 'hidden' , 'style'=> 'display:none']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Добавить' ,['class'=>'btn']) !!}
                        </div>
                        {!! Form::close() !!}
                        <hr>
                        <div class="comment_area clearfix mb-100">
                            <ol>
                                <!-- Single Comment Area -->
                                @foreach ($comments as $key => $comment)
                                <li class="single_comment_area">
                                    <!-- Comment Content -->
                                    <div class="comment-content d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-meta">
                                            <div class="d-flex">
                                                <a href="{{ action('Site\SiteController@getUserItem' , App\User::find($comment->user_id)->id) }}"
                                                    class="post-author">{{ App\User::find($comment->user_id)->name}}</a>
                                                <a href="#" class="post-date">{{ $comment->created_at->format('d.m.Y') }}</a>
                                            </div>
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach

                        </div>
                    </div>
                </div>


                @endif
            </div>
            @include('site.layouts.saidbar')
        </div>
    </div>
</section>


@push('scripts')
<script type="text/javascript">
     $(document).ready(function () {
        console.log('asdasdasdasd');

        $('.likable').click(function(e){
            e.preventDefault();
            console.log(e.target.href);


           $.ajax({
                    type: 'GET',
                    url: e.target.href,
                    //dataType: 'json',
                    data: {
                        //'_token': $('html').find('meta[name="csrf-token"]').attr('content'),
                       },
                    //beforeSend: function (request) {  console.log(request);},
                    error: function (response) {console.log('ERROR: '+response);},
                    success: function (response) {  
                        console.log(response);
                        if($('.likable').html() === 'Нравится'){$('.likable').html('Убрать') ;}
                        else{$('.likable').html('Нравится') ;}
                            $('#countLikes').html(response);
                    }
                });

        });

/*$.ajax({
                    type: 'GET',
                    url: url+a.html()+'/edit/',
                    //dataType: 'json',
                    data: {
                        //'_token': $('html').find('meta[name="csrf-token"]').attr('content'),
                        'id': a.html(),
                        'text': text,
                        'column_name': b
                    },
                    //beforeSend: function (request) {  console.log(request);},
                    error: function (response) { active.html(originalContent); console.log('ERROR: '+response);},
                    success: function (response) {  console.log(response);}
                });*/



     })
</script>
@endpush
@endsection
