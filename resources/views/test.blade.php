@extends('site.layouts.app')

@section('content')

  <div class="title m-b-md">
                Index Page
                </div>

               @include('site.layouts.menu')





    <h3>Test</h3>

  {{--
@foreach($user_posts as $post)

        <span>{{$post->id}}</span><br>
        <span><a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}">{{ $post->meta_title }}</a>  </span>
        <br>

    @endforeach

  	--}}  





@endsection