@extends('site.layouts.app')

@section('content')

    <div class="title m-b-md">
        User page
    </div>

    @include('site.layouts.menu')

    <br>
    <br>
    <br>
@php
    $check = true;
  
    if(Auth::check() && App\User::findOrFail($user->id)->isFollowing(App\User::where('id' , Auth::user()->id)->get())){
     $check = false;
    
    }
    
@endphp
    <!-- User Block Start -->
    <h3>Пользователь </h3>

<hr>
<hr>
<hr>
@if(Auth::id() > 0)




@if($is_follow)
<a href="{{ route('user.unfollow' , $user->id)}}">Отписаться</a>
@elseif(Auth::id() == $user->id)
@else
 <a href="{{ route('user.follow' , $user->id)}}">Подписаться</a>
@endif


@endif 

    <br>
   

<hr>
    <span>{{$user->id}}</span><br>
    <span>{{$user->name}}</span><br>
    <span>{{ config('app.url')}}/{{$user->img}}</span><br>
    <span>{{$user->about}}</span><br>

    <!-- User Block End -->

 <!-- User Posts Following Start -->

 <h3>Проекты юзеров с подписки</h3>
 @foreach($followings_projects as $project)

        <span>{{$project->id}}</span><br>
        <span><a href="{{ action('Site\SiteController@getProjectsItem' , $project->alias) }}">{{ $project->meta_title }}</a>  </span>
        <br>

    @endforeach



 <!-- User Posts Following End -->

<br>
<br>
<br>
<br>
<br>
<br>
    <!-- User Posts Start -->
    <h3>Посты юзера </h3>

    @foreach($user_posts as $post)

        <span>{{$post->id}}</span><br>
        <span><a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}">{{ $post->meta_title }}</a>  </span>
        <br>

    @endforeach



    <!-- User Posts End -->

    <!-- User Projects Start -->
    <h3>Проекты юзера </h3>

    @foreach($user_projects as $projects)

        <span>{{$projects->id}}</span><br>
        <span><a href="{{ action('Site\SiteController@getProjectsItem' , $projects->alias) }}">{{ $projects->meta_title }}</a>  </span>
        <br>

    @endforeach



    <!-- User Projects End -->


@endsection