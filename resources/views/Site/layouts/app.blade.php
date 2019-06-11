<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         @include('site.layouts.head')

    </head>
    <body>
        <div class=" position-ref flull-height">
           @include('site.layouts.header')

            <div class="content">
                 @yield('content')
            </div>
        </div>
         @include('site.layouts.footer')

    </body>
</html>
