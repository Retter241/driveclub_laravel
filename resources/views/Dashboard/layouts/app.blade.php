<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{  config('app.url')  }}/public/css/style.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {csrfToken: '{{ csrf_token() }}'};

    </script>

    <title>{{ config('app.name', 'DriveClub - Админ-панель') }}</title>

    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        form {
            width: 100%;
        }

        .col-md-6 {
            float: left;
        }

        .content img {
            max-width: 150px;
        }
    </style>
    @stack('styles')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'DriveClub') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @if (Auth::check())
                        @if (Auth::user()->sudo == 1)
                          <!--  <li class="nav-item">Sudo: {{ Auth::user()->sudo }}</li>&nbsp -->
                        @endif
                     <!--   <li class="nav-item">Level: {{ Auth::user()->level }}</li>&nbsp -->
                    @endif
                    <!--<li class="nav-item"><a href="{{ url('dashboard/test') }}" style="color:red">Test</a></li>-->

                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/') }}">Главная</a></li>
                    @can('post-list')
                        <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/post') }}">Новости</a></li>
                    @endcan
                    @can('project-list')
                        <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/project') }}">Проекты</a></li>
                    @endcan
                    @can('comment-list')
                        <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/comments') }}">Комментарии</a></li>
                    @endcan
                    @if (Auth::check())
                        @if (Auth::user()->sudo == 1)
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ url('dashboard/categories') }}">Категории</a></li>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:deepskyblue">
                                        Users<span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"
                                           href="{{ url('dashboard/users') }}">Пользователи</a>
                                        <a class="dropdown-item" href="{{ url('dashboard/roles') }}">Роли</a>
                                        <a class="dropdown-item" href="{{ url('dashboard/permissions') }}">Разрешения</a>
                                    </div>
                                </li>
                            </ul>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('dashboard/users') }}">Профиль</a>
                            </li>
                        @endif
                    @endif


                </ul>




                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               {{--<img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}">--}}
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/') }}" target="_blank">Перейти на сайт</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>


                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<script src="{{ asset('dashboards/ckeditor/ckeditor.js') }}" defer></script>
<script src="{{ asset('dashboards/ckeditor/AjexFileManager/ajex.js') }}" defer></script>

{{--
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ asset('dashboards/jqfileupload/js/vendor/jquery.ui.widget.js') }}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ asset('dashboards/jqfileupload/js/jquery.iframe-transport.js') }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ asset('dashboards/jqfileupload/js/jquery.fileupload.js') }}"></script> --}}


<script type="text/javascript">
    $(document).ready(function () {

//admin-panel tooltips start
        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
                html: true
            })
        });
        //admin-panel tooltips End

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var editor = CKEDITOR.replace('visual_editor', {
            height: 350,
            removePlugins: 'easyimage',
            filebrowserUploadUrl: '{{ route('upload',["_token" => csrf_token() ]) }}',
        });
        //AjexFileManager.init({returnTo: 'ckeditor', editor: editor});
        //$('#visual_editor').val(CKEDITOR.instances['visual_editor'].getData());
        CKEDITOR.instances['visual_editor'].on("blur", function () {
            var data = CKEDITOR.instances['visual_editor'].getData();
            $('#visual_editor').val(data);
            //console.log( $('#visual_editor').val());
        });

        CKEDITOR.on('instanceReady', function (ev) {
            ev.editor.dataProcessor.htmlFilter.addRules({
                elements: {
                    img: function (el) {
                        // Add bootstrap "img-responsive" class to each inserted image
                        el.addClass('img-responsive');

                        // Remove inline "height" and "width" styles and
                        // replace them with their attribute counterparts.
                        // This ensures that the 'img-responsive' class works
                        var style = el.attributes.style;

                        if (style) {
                            // Get the width from the style.
                            var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                width = match && match[1];

                            // Get the height from the style.
                            match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                            var height = match && match[1];

                            // Replace the width
                            if (width) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                                el.attributes.width = width;
                                delete el.attributes.width;
                            }

                            // Replace the height
                            if (height) {
                                el.attributes.style = el.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                                el.attributes.height = height;
                                delete el.attributes.height;
                            }
                        }

                        // Remove the style tag if it is empty
                        if (el.attributes.style)
                            delete el.attributes.style;
                    }
                }
            });
        });


        /* Fields Translit Start */
        var ru2en = {
            ru_str: 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя(),.; "+/*?!@',
            en_str: ['a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                'a', 'b', 'v', 'g', 'd', 'e', 'jo', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
                'h', 'c', 'ch', 'sh', 'shh', '', 'i', '', 'je', 'ju', 'ja',
                '', '', '', '', '', '-', '', '', '', '', '', '', ''],
            translit: function (org_str) {

                var tmp_str = "";
                for (var i = 0, l = org_str.length; i < l; i++) {
                    var s = org_str.charAt(i), n = this.ru_str.indexOf(s);
                    if (n >= 0) {
                        tmp_str += this.en_str[n];
                    }
                    else {
                        tmp_str += s;
                    }
                }
                return tmp_str.toLowerCase();
            }
        };

        function TranslitCustom(old_input, old_value, new_input, new_value, rewritemode = true) {
            //console.log(new_value, rewritemode);
            if (new_value != undefined) {
                //console.log('clear');
                new_input.val(ru2en.translit(old_value));
            }
        }


        $('#meta_title').on('change keypress keyup keydown', function (e) {
            TranslitCustom($('#meta_title'), $('#meta_title').val(), $('#alias'), $('#alias').val());
        });//page post + project


        /* Fields Translit End */


    })
</script>


<!--  Admin dropzone include
<link href="{{ asset('dashboards/dropzone/dist/dropzone.css') }}" rel="stylesheet">
<script src="{{ asset('dashboards/dropzone/dist/dropzone.js') }}" defer></script>-->


<script type="text/javascript">
    $(document).ready(function () {


//$("div#dropzone").dropzone({ url: "/file/post" });
        /*
        var dropzone = new Dropzone('#dropzone', {
            //previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 2,
            url: "/file/post",
            thumbnailHeight: 120,
            thumbnailWidth: 120,
            maxFilesize: 3,
            filesizeBase: 1000,
            thumbnail: function(file, dataUrl) {
              if (file.previewElement) {
                file.previewElement.classList.remove("dz-file-preview");
                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                for (var i = 0; i < images.length; i++) {
                  var thumbnailElement = images[i];
                  thumbnailElement.alt = file.name;
                  thumbnailElement.src = dataUrl;
                }
                setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); }, 1);
              }
            }

          });*/

        /*Dropzone.options.slider = {
            maxFilesize  : 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };*/

    });
</script>
<!-- ***** Admin dropzone include ********  -->


@stack('scripts')

</body>
</html>
