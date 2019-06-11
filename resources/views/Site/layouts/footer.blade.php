<footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content text-center">
                        <div class="footer-nav">
                            <ul>
                                <li><a href="#">О нас</a></li>
                                <li><a href="/ads">Рекламодателям</a></li>
                                <li><a href="#">Поддержка</a></li>
                            </ul>
                        </div>
                        <div class="footer-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Vkontakte"><i class="fa fa-vk" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>
                        <p class="mb-15">DriveClub - сообщество для людей и автомобилей. Мы объединяем людей болеющих автомобилями также сильно как мы!</p>
                        <p class="copywrite-text"><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> DriveClub</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{  config('app.url')  }}/public/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="{{  config('app.url')  }}/public/js/bootstrap/popper.min.js"></script>
    <script src="{{  config('app.url')  }}/public/js/bootstrap/bootstrap.min.js"></script>
    <script src="{{  config('app.url')  }}/public/js/plugins/plugins.js"></script>
    <script src="{{  config('app.url')  }}/public/js/active.js"></script>
<script type="text/javascript"> 
$(document).ready(function(e){ 
console.log(';;'); 
$('#comment_form').submit(function(e){ 
e.preventDefault(); 
console.log($(this).serialize()); 
$.ajax({ 
type: $(this).attr('method'), 
url: $(this).attr('action'), 
//dataType: 'json', 
data:$(this).serialize(), 

//'data': JSON.stringify($('#editPage').serialize()) 

//'_token': $('html').find('meta[name="csrf-token"]').attr('content'), 


//beforeSend: function (request) { console.log(request);}, 
error: function (response) { console.log('ERROR: '+response.body);},
success: function (response) { 
console.log(response); 
var block = ''; 
block += '<li class="single_comment_area"><div class="comment-content d-flex"><div class="comment-meta"><div class="d-flex"><a href="http://dimamlab/users/'+response.user_id+'" class="post-author">Admin</a><a href="#" class="post-date">June 23, 2018 </a></div><p>'+response.body+'</p></div></div></li>'; 

$('.comment_area').find('ol').append(block); 
console.log(block); 
} 
}); 
}) 
}) 
</script>
    
@stack('scripts')