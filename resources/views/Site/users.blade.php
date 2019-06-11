@extends('site.layouts.app')

@section('content')

    <div class="title m-b-md">
        Users page
    </div>

    @include('site.layouts.menu')

    <br>
    <br>
    <br>
    <h3>Пользователи </h3>
    @foreach($users as $user)
        <!-- User Block Start -->
        <span>{{$user->id}}</span><br>
        <span>
            <a href="{{ action('Site\SiteController@getUserItem' , $user->id) }}">{{$user->name}}</a>
        </span><br>
        <span>{{ config('app.url')}}/{{$user->img}}</span><br>
        <span>{{$user->about}}</span><br>

        <!-- User Block End -->
    @endforeach






    <!-- User Posts End -->


@endsection