@extends('site.layouts.app')

@section('content')
    @include('site.layouts.menu')


    <div class="container">
        <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="row">
    @foreach($categories as $category)

    <div class="col-12 col-md-6 mb-30">
<div class="category-block">
 <p class="title"><a href="{{ action('Site\SiteController@getAllByCategory' , $category->alias) }}">{{ $category->name }}</a></p>
</div>
</div>

    @endforeach
    
    </div>
    </div>
    @include('site.layouts.saidbar')
    </div>
    </div>
    <!-- Category Block End -->







@endsection