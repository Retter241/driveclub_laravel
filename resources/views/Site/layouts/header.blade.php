<header class="container-fluid main-header">
    <div class="row">
        <div class="col-lg-12">
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a class="dropdown-item" href="{{ url('/dashboard') }}">Личный кабинет</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Выйти
            </a>
<!--<a href="{{ url('test') }}" style="color:red">Test</a>-->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        @else
            <a class="dropdown-item" style="display: initial;" href="{{ route('login') }}">Войти</a>
            @if (Route::has('register'))
                <a class="dropdown-item" style="display: initial;" href="{{ route('register') }}">Зарегистрироваться</a>
            @endif
        @endauth
       
    </div>

@endif




</div>
</div>
</header>



