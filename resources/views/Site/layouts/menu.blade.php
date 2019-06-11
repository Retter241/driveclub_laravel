<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="offset-lg-4 col-lg-4 text-center">
            
            </div>
        </div>
    </div>
    <div class="newsbox-main-menu">
    
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
           
                <nav class="classy-navbar justify-content-center" id="newsboxNav">
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ action('Site\SiteController@index') }}">Главная</a></li>
                               <!-- <li><a href="{{ action('Site\SiteController@getNewsList') }}">Новости</a></li> -->
                                <li> <a href="{{ action('Site\SiteController@feeds') }}">Лента</a></li>
                                <li><a href="{{ action('Site\SiteController@getCategoryList') }}">Категории</a></li>
                                <li> <a href="{{ action('Site\SiteController@getProjectsList') }}">Проекты</a></li>
                                <li> <a href="{{ action('Site\SiteController@polling') }}">Опросы</a></li>
                              <!-- <li> <a href="{{ action('Site\SiteController@getUserList') }}">Пользователи</a></li> -->
                             
                            </ul>
                            <span>
                            
                            </span>
                        </div>
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
</header>
