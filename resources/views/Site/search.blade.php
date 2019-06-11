@extends('site.layouts.app')

@section('content')

@include('site.layouts.menu')

<div class="container">
    <div class="row">
    <div class="col-12 col-md-8 col-lg-8">
     
    



        @if(isset($projects))
            {{-- Projects Block Start --}}
            <div class="intro-news-filter d-flex justify-content-between">
                <h6>Проекты по запросу : {{ app('request')->input('text') }}</h6>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    </div>
                </nav>
            </div>
            @if(!empty($projects))

                @foreach($projects as $project)

                    <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                        <div class="blog-thumbnail">
                            <a href="{{ action('Site\SiteController@getProjectsItem' , $project->alias) }}"><img
                                        src="{{ config('app.url')}}/{{ $project->img }}" alt=""></a>
                        </div>
                        <div class="blog-content">
                            <span class="post-date">{{ $project->created_at->format('d.m.Y') }}</span>
                            <a href="{{ action('Site\SiteController@getProjectsItem' , $project->alias) }}"
                               class="post-title">{{ $project->meta_title }}</a>
                            <a href="{{ action('Site\SiteController@getUserItem' , $project->author) }}" class="post-author">{{ $project->user->name }}</a>
                            <img style="width: 25px; padding-right:5px; margin-bottom: 2px;"
                                 src="\public\dashboards\image\dashboard-black.png" />{{ $project->view_count }}
                        <!--<span>Likes: {{ $project->likes->count() }}</span>-->
                        </div>
                    </div>
                @endforeach
            @else
                Проектов не найдено
            @endif
            {{-- Projects Block End --}}
        @endif

        @if(isset($posts))
                {{-- News Block Start --}}
                <div class="intro-news-filter d-flex justify-content-between">
                    <h6>Новости по запросу:  {{ app('request')->input('text') }}</h6>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                        </div>
                    </nav>
                </div>

                    @foreach($posts as $post)
                        <div class="single-blog-post d-flex flex-wrap style-5 mb-30">
                            <div class="blog-thumbnail">
                                <a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}"><img
                                            src="{{ config('app.url')}}/{{ $post->img }}" alt=""></a>
                            </div>
                            <div class="blog-content">
                                <span class="post-date">{{ $post->created_at->format('d.m.Y') }}</span>
                                <a href="{{ action('Site\SiteController@getNewsItem' , $post->alias) }}"
                                   class="post-title">{{ $post->meta_title }}</a>
                                <a href="{{ action('Site\SiteController@getUserItem' , $post->author) }}" class="post-author">{{ $post->user->name }}</a>
                                <img style="width: 25px; padding-right:5px; margin-bottom: 2px;"
                                     src="\public\dashboards\image\dashboard-black.png" />{{ $post->view_count }}
                            <!--<span>Likes: {{ $post->likes->count() }}</span>-->
                            </div>
                        </div>
                    @endforeach



                {{-- News Block End --}}
        @endif




     
    </div>    
    @include('site.layouts.saidbar')
    </div>
</div>


@endsection