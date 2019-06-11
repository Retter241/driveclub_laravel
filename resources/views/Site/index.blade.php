@extends('site.layouts.app')


@section('content')



@include('site.layouts.menu')

<section class="intro-news-area mb-70">
    <div class="container">
        <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
            <div class="intro-news-tab">
                    @include('Site.layouts.findForm')
</div>
                <div class="intro-news-tab">
                    <div class="intro-news-filter d-flex justify-content-between">
                        <h6>Последние новости</h6>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-1">
                            <div class="row">
                                @foreach($catblock_1 as $item)
                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post style-2 mb-5">
                                        <div class="blog-thumbnail">
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"><img
                                                    src="{{ config('app.url')}}/{{ $item->img }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                            <span class="post-date mr-10">{{ $item->created_at->format('d.m.Y') }}</span>
                                            <span class="post-date mr-10 makeHot"><img
                                                    style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                                    src="\public\dashboards\image\dashboard-black.png" /><span class="counter1">{{ $item->view_count }}</span></span>
                                                    <span id="most-view" class="post-date hot">
                                                <img
                                                    style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                                    src="\public\dashboards\image\fire.png" />
                                                    <span>Hot!</span>
                                                </span>
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"
                                                class="post-title">{{ $item->meta_title }}</a>
                                            <a href="{{ action('Site\SiteController@getUserItem' , $item->author) }}" class="post-author">{{ App\User::find($item->author)->name}}</a>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <div class="intro-news-filter col-lg-12 text-left">
                                    <h6>Автоспорт</h6>
                                </div>
                                @foreach($catblock_2 as $item)
                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post style-2 mb-5">
                                        <div class="blog-thumbnail">
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"><img
                                                    src="{{ config('app.url')}}/{{ $item->img }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                            <span class="post-date mr-10">June 20, 2018</span>
                                            <span class="post-date"><img
                                                    style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                                    src="\public\dashboards\image\dashboard-black.png" />{{ $item->view_count }}</span>
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"
                                                class="post-title">{{ $item->meta_title }}</a>
                                            <a href="#" class="post-author">{{ App\User::find($item->author)->name}}</a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <img class="mb-50" src="public/dashboards/image/ads-content.png" alt="Рекламам">
                                <div class="intro-news-filter col-lg-12 text-left">
                                    <h6>Тест-драйв</h6>
                                </div>
                                @foreach($catblock_3 as $item)
                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post style-2 mb-5">
                                        <div class="blog-thumbnail">
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"><img
                                                    src="{{ config('app.url')}}/{{ $item->img }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                            <span class="post-date mr-10">June 20, 2018</span>
                                            <span class="post-date"><img
                                                    style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                                    src="\public\dashboards\image\dashboard-black.png" />{{ $item->view_count }}</span>
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"
                                                class="post-title">{{ $item->meta_title }}</a>
                                            <a href="#" class="post-author">{{ App\User::find($item->author)->name}}</a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <div class="intro-news-filter col-lg-12 text-left">
                                    <h6>Происшествия</h6>
                                </div>
                                @foreach($catblock_4 as $item)
                                <div class="col-12 col-sm-6">
                                    <div class="single-blog-post style-2 mb-5">
                                        <div class="blog-thumbnail">
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"><img
                                                    src="{{ config('app.url')}}/{{ $item->img }}" alt=""></a>
                                        </div>
                                        <div class="blog-content">
                                            <span class="post-date mr-10">June 20, 2018</span>
                                            <span class="post-date"><img
                                                    style="width: 20px; padding-right:5px; margin-bottom: 2px;"
                                                    src="\public\dashboards\image\dashboard-black.png" />{{ $item->view_count }}</span>
                                            <a href="{{ action('Site\SiteController@getNewsItem' , $item->alias) }}"
                                                class="post-title">{{ $item->meta_title }}</a>
                                            <a href="#" class="post-author">{{ App\User::find($item->author)->name}}</a>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('site.layouts.saidbar')
        </div>
    </div>
</section>
@endsection
