<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    {{--<a href="/"><title>وبسایت راکت</title></a>--}}

    <!-- Bootstrap Core CSS -->
    @if(app()->getLocale() == 'fa')
        <link href="/css/home.css" rel="stylesheet">
    @elseif(app()->getLocale() == 'en')
        <link href="/css/home.css" rel="stylesheet">
    @endif
    <link rel="alternate" type="application/rss+xml" title="فید مقالات راکت" href="/feed/articles">
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">@lang('messages.title') @endlang</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                @if(auth()->check())
                    <li>
                        <a href="{{ route('user.panel') }}">پنل کاربری</a>
                    </li>
                    <li>
                        <a href="/logout">خروج</a>
                    </li>
                @else
                    <li>
                        <a href="{{route('login')}}"> ورود</a>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#">مقالات</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">درباره‌ما</a>--}}
                    {{--</li>--}}
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div id="app" class="container">

    <div class="row">
        @yield('content')
    </div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->


<script src="/js/app.js"></script>
<script src="/js/sweetalert.min.js"></script>
@include('sweet::alert')
</body>

</html>
