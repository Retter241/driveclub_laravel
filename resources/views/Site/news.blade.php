@extends('site.layouts.app')

@section('content')

  <div class="title m-b-md">
                News Page
                </div>

                @include('site.layouts.menu')

                <br>
                <br>
                <br>

<!-- News Block Start -->
<h3>Новости</h3>
 @foreach($posts as $post)

                <span>{{ $post->id }}</span>
                <span>
<a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}">{{ $post->meta_title }}</a>                 </span><br>
                  <span style="color: red">
                    <a href="{{ action('Site\SiteController@getAllByCategory' , App\Category::find($post->category_id)->alias) }}">
            {{ App\Category::find($post->category_id)->name}}
          </a>
      </span>
                <span><img src="{{ config('app.url')}}/{{ $post->img }}" style="width:100px;height:50px;"></span>
                <span>{{ $post->author }}</span>

                @endforeach
<!-- News Block End -->
 


<!-- News Block Start -->
<h3>Категории</h3>
 @foreach($categories as $category)

                <span>{{ $category->id }}</span>
                <span>        <a href="{{ action('Site\SiteController@getAllByCategory' , App\Category::find($category->id )->alias ) }}">
            {{ $category->name }}
          </a></span>
                @endforeach
<!-- News Block End -->


              

@endsection