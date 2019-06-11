@extends('site.layouts.app')

@section('content')


@include('site.layouts.menu')
<section class="intro-news-area mb-70">

            <div class="news-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-8">
                        <div class="intro-news-tab">
                    <div class="intro-news-filter d-flex justify-content-between">
                        <h6>Проекты</h6>
                    </div>
                </div>
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
                           {!! $projects->links() !!}
                        </div>
                        @include('site.layouts.saidbar')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







@endsection
