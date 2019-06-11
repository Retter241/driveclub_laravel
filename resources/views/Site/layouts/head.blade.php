<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>DriveClub</title>
<link rel="icon" href="{{  config('app.url')  }}/public/dashboards/image/favicon2.png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link rel="stylesheet" href="{{  config('app.url')  }}/public/css/style.css">
<link rel="stylesheet" href="{{  config('app.url')  }}/public/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{  config('app.url')  }}/public/js/jquery/jquery-2.2.4.min.js"></script>
<script src="{{  config('app.url')  }}/public/js/active.js"></script>


@stack('styles')
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
        background: rgba(0,0,0,0.6);
        padding: 5px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #fff;
        padding: 0 20px;
        font-size: 16px;
        font-weight: 600;
        /*letter-spacing: .1rem;*/
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>