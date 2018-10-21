<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="摄影首页">
    <meta name="keywords" content="摄影首页">
    <meta name="renderer" content="webkit">
    <meta name="applicable-device" content="pc">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.9.7/jquery.fullpage.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/styles.css') }}">

    @yield('style')
</head>
<body>
    <!-- header -->
	<header class="lt-header">
        <div class="header-box fn-clear">
            <a href="/" class="logo-box"><img class="logo" src="/images/default/logo.png" alt="" width="184" height="46"></a>
            <ul class="header-nav fn-clear">
                @guest
                    <li>
                        <a href="/">产品</a>
                    </li>
                    <li>
                        <a href="/template">模板</a>
                    </li>
                    <li>
                        <a href="/price">价格</a>
                    </li>
                @else
                    <li>
                        <a href="/album">相册</a>
                    </li>
                    <li>
                        <a href="/template">模板</a>
                    </li>
                    <li>
                        <a href="/contact">联系</a>
                    </li>
                @endguest
            </ul>
            <div class="header-other">
                @guest
                    <a href="/login" class="other-btn">
                        <span>登录</span>
                    </a>
                @else
                    <a href="#" class="other-btn">
                        <i class="icon-manage"></i><span>预览站点</span>
                    </a>
                    <a class="header-img-box" data-toggle="dropdown">
                        @if(Auth::user()->avatar)
                        <img class="navbar-avatar" src="{{ asset('storage/'.config('image.avatar.save_path').Auth::user()->id.'.'.config('image.avatar.save_format')) }}" alt="{{ Auth::user()->name }}">
                        @else
                            <img height="30" width="30" src="/images/default/user.png" alt=""><span class="name">Kami</span>
                            <span class="caret"></span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item"><i class="iconfont">&#xe608;</i> 个人设置</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="iconfont">&#xe650;</i> 退出登录
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                @endguest                
            </div>
        </div>
    </header>
    <!-- /header -->

    <div style="margin-top: 16px;">
        @yield('content')
    </div>

    <script type="text/template" id="loading_tpl">
        <div class="loading">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </script>
    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    @yield('script')

    <script>
    (function(){
        var pathname = window.location.pathname;
        $('.header-nav li a').each(function(index, link){
            if($(link).attr('href') == pathname){
                $(link).parent().addClass('cur')
            }
        });
    })()
    </script>
</body>
</html>
