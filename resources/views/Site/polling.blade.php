@extends('site.layouts.app')

@section('content')

    @push('styles')
        <link rel="stylesheet" href="{{ config('app.url')}}/site/polling/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
    @endpush

    @include('site.layouts.menu')




    @if (!Auth::check() || $level == 0)
    <div class="container">
<div class="polling-block-auth">
        <div>Для прохождения опроса небходима <a href="{{ route('login') }}">Авторизация</a></div><br>
        <div>Нет аккаунта? <a href="{{ route('register') }}">Регистрация</a></div>
        </div>
        </div>
    @else


        @if ($message = Session::get('error'))
            <div class="container alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif



        @if ($level == 1)
            <div>Для доступа к комментариям пройдите тест<br>
            @includeIf('site.poller.poll1', [])
        @elseif($level == 2)
                    <div>Вам доступны раздел <a href="#">комментарии</a><br>
            <div>Для доступа к публикации  проектов  пройдите тест <br>
            @includeIf('site.poller.poll2', [])
        @elseif($level == 999)
             <div>Вам доступны <a href="#">комментарии</a><br>
            <div>Вам доступен раздел <a href="#">Проекты</a><br>
        @endif





    @endif


    {{--

    $('.pol').submit(function(e){
    e.preventDefault();
    console.log($(this));
    })

        --}}

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="{{ config('app.url')}}/site/polling/script.js"></script>
    @endpush

@endsection