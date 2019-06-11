@extends('site.layouts.app')

@section('content')

@include('site.layouts.menu')
<section class="intro-news-area">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-8 col-lg-8">
                <div class="intro-news-tab">
                    <div class="intro-news-filter d-flex justify-content-between">
                        <h6>{{ $category }}</h6>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-1">
                            <div class="row">
                                @foreach($posts as $post)
                                <div class="col-12 col-md-6">
                                    <div class="single-blog-post style-2 mb-5">
                                        <div class="blog-thumbnail">
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}"><img
                                                    src="{{ config('app.url')}}/{{ $post->img }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                            <span class="post-date">{{ $post->created_at->format('d.m.Y') }}</span>
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}"
                                                class="post-title">{{ $post->meta_title }}</a>
                                            <a href="{{ action('Site\SiteController@getUserItem' , $post->user->id) }}" class="post-author">{{ App\User::find($post->author)->name}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
 {!! $posts->links() !!}
                </div>
            </div>
            @include('site.layouts.saidbar')
        </div>
    </div>
</section>
@endsection
