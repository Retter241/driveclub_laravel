<div class="col-12 col-md-4 col-lg-4">
                    <div class="sidebar-area">
             
                       
                    <div class="intro-news-filter col-lg-12 text-left">
                    
                            <h6>Лучшие проекты</h6>
                        </div>
                        <!-- Add Widget -->
                        @foreach($sidebar as $project)
                        <div class="single-blog-post d-flex style-4 mb-30">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="{{ action('Site\SiteController@getProjectsItem' , $project->alias) }}"><img src="{{ config('app.url')}}/{{ $project->img }}" alt=""></a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div style="text-align:left;" class="blog-content">
                                                <span class="post-date">{{ App\User::find($project->author)->name}}</span>
                                                <a href="{{ action('Site\SiteController@getProjectsItem' , $project->alias) }}" class="post-title">{{ $project->meta_title }}</a>
                                            </div>
                                        </div>
                @endforeach
 <!-- Newsletter Widget -->
 <div class="single-widget-area newsletter-widget mb-30">
                            <h4>Подпишитесь на нашу рассылку!</h4>
                            <form action="#" method="post">
                                <input type="email" name="nl-email" id="nlemail" placeholder="E-Mail">
                                <button type="submit" class="btn newsbox-btn w-100">Подписаться</button>
                            </form>
                        </div>
                        <img class="mb-50" src="/public/dashboards/image/ads.jpg" width="100%" height="100%" alt="Реклама">
                    </div>
                </div>
            </div>
        </div>
  