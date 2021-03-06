<!DOCTYPE html>
<!--[if IE 9 ]>
<html class="ie9"><![endif]-->

<!--[if !IE]> -->
<html>
<!-- <![endif]-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">

    <meta name="description" content="Violate Responsive Admin Template">
    <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{elixir('css/sa.css')}}">
    @yield('link')
    <link rel="stylesheet" href="{{elixir('css/app.css')}}">
</head>
<body id="skin-cloth">

<header id="header" class="media">
    <a href="#" id="menu-toggle"></a>
    <a class="logo pull-left" href="{{url('/')}}">KNOWLEDGE BASE</a>

    <div class="media-body">
        <div class="media" id="top-menu">
            @if(!Auth::check())
                <div class="pull-left tm-icon">
                    <a href="{{url('login')}}">
                        {{--<i class="sa-top-login"></i>--}}
                        <i class="fa fa-key neat-nav-icon"></i>
                        <span>Login</span>
                    </a>
                </div>
            @else
                <div class="pull-left tm-icon">
                    <a href="{{url('logout')}}">
                        {{--<i class="sa-top-login"></i>--}}
                        <i class="fa fa-power-off neat-nav-icon"></i>
                        <span>Logout</span>
                    </a>
                </div>
            @endif
            <div class="pull-left tm-icon">
                <a data-drawer="messages" class="drawer-toggle" href="#">
                    <i class="fa fa-envelope-o neat-nav-icon"></i>
                    <i class="n-count animated">5</i>
                    <span>Messages</span>
                </a>
            </div>
            <div class="pull-left tm-icon">
                <a data-drawer="notifications" class="drawer-toggle" href="#">
                    <i class="fa fa-bullhorn neat-nav-icon"></i>
                    <i class="n-count animated">9</i>
                    <span>Updates</span>
                </a>
            </div>

            <div id="time" class="pull-right">
                <span id="hours"></span>
                :
                <span id="min"></span>
                :
                <span id="sec"></span>
            </div>

            <div class="media-body">
                <i class="fa fa-search neat-nav-search"></i>
                <input type="text" class="main-search">
            </div>
        </div>
    </div>
</header>

<div class="clearfix"></div>

<section id="main" class="p-relative" role="main">

    <!-- Sidebar -->
    <aside id="sidebar">

        <!-- Sidbar Widgets -->
        <div class="side-widgets overflow">

        @if(Auth::check())
            <!-- Profile Menu -->
                <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                    <a href="#" data-toggle="dropdown">
                        <img class="profile-pic animated"
                             src="{{url('media/profile/' . rawurlencode(Auth::user()->name) . '/' . Auth::user()->id)}}"
                             alt="">
                    </a>
                    <ul class="dropdown-menu profile-menu">
                        <li><a href="{{url('user/profile')}}">My Profile</a>
                            <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        <li><a href="#">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i>
                        </li>
                        <li><a href="#">Settings</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i>
                        </li>
                        <li><a href="{{url('logout')}}">Logout</a>
                            <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                    </ul>
                    <h4 class="m-0">{{Auth::user()->name}}</h4>
                    {{Auth::user()->email}}
                </div>
        @endif

        <!-- Feeds -->
            <div class="s-widget m-b-25">
                <h2 class="tile-title">
                    Tech News Feeds
                </h2>

                <div class="s-widget-body">
                    <div id="news-feed"></div>
                </div>
            </div>
        </div>

        <!-- Side Menu -->
        <ul class="list-unstyled side-menu">
            <li class="{!! classActivePath('/') !!}">
                {{--<a class="menu-icon fa fa-home" href="{{url('/')}}">--}}
                <a class="sa-side-fa-home" href="{{url('/')}}">
                    <span class="menu-item">Home</span>
                </a>
            </li>
            @if(Auth::check() && Auth::user()->can('view_user'))
                <li class="dropdown {!! classActivePath('admin') !!}">
                    <a class="sa-side-fa-user" href="#">
                        <span class="menu-item">Administration</span>
                    </a>
                    <ul class="list-unstyled menu-item">
                        <li><a href="{{url('admin/user')}}">Manage Users</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::check() && Auth::user()->can('view_chams'))
                <li class="dropdown {!! classActivePath('chams') !!}">
                    <a class="sa-side-fa-ticket" href="#">
                        <span class="menu-item">QBE CHAMS</span>
                    </a>
                    <ul class="list-unstyled menu-item">
                        <li><a href="{{url('chams')}}">Home</a></li>
                        <li><a href="{{url('chams/users')}}">Users</a></li>
                        <li><a href="{{url('chams/business_units')}}">Business Units</a></li>
                        <li><a href="{{url('chams/assets')}}">Assets</a></li>
                        <li><a href="{{url('chams/events')}}">Events</a></li>
                        <li><a href="{{url('chams/bookings')}}">Bookings</a></li>
                        <li><a href="{{url('chams/reports')}}">Reports</a></li>
                    </ul>
                </li>
            @endif
        </ul>

    </aside>

    <!-- Content -->
    <section id="content" class="container">

        <!-- Messages Drawer -->
        <div id="messages" class="tile drawer animated">
            <div class="listview narrow">
                <div class="media">
                    <a href="#">Send a New Message</a>
                    <span class="drawer-close">&times;</span>

                </div>
                <div class="overflow" style="height: 254px">
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/1.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Nadin Jackson - 2 Hours ago</small>
                            <br>
                            <a class="t-overflow" href="#">Mauris consectetur urna nec tempor adipiscing. Proin sit amet
                                nisi ligula. Sed eu adipiscing lectus</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/2.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">David Villa - 5 Hours ago</small>
                            <br>
                            <a class="t-overflow" href="#">Suspendisse in purus ut nibh placerat Cras pulvinar euismod
                                nunc quis gravida. Suspendisse pharetra</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/3.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Harris worgon - On 15/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Maecenas venenatis enim condimentum ultrices fringilla. Nulla
                                eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar,
                                ornare turpis id</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/4.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Mitch Bradberry - On 14/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Phasellus interdum felis enim, eu bibendum ipsum tristique
                                vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel
                                blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/1.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Nadin Jackson - On 15/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin
                                sit amet nisi ligula. Sed eu adipiscing lectus</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/2.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">David Villa - On 16/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Suspendisse in purus ut nibh placerat Cras pulvinar euismod
                                nunc quis gravida. Suspendisse pharetra</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/3.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Harris worgon - On 17/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Maecenas venenatis enim condimentum ultrices fringilla. Nulla
                                eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar,
                                ornare turpis id</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/4.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Mitch Bradberry - On 18/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Phasellus interdum felis enim, eu bibendum ipsum tristique
                                vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel
                                blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/5.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Wendy Mitchell - On 19/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Integer a eros dapibus, vehicula quam accumsan, tincidunt
                                purus</a>
                        </div>
                    </div>
                </div>
                <div class="media text-center whiter l-100">
                    <a href="#">
                        <small>VIEW ALL</small>
                    </a>
                </div>
            </div>
        </div>

        <!-- Notification Drawer -->
        <div id="notifications" class="tile drawer animated">
            <div class="listview narrow">
                <div class="media">
                    <a href="#">Notification
                        <Settings></Settings>
                    </a>
                    <span class="drawer-close">&times;</span>
                </div>
                <div class="overflow" style="height: 254px">
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/1.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Nadin Jackson - 2 Hours ago</small>
                            <br>
                            <a class="t-overflow" href="#">Mauris consectetur urna nec tempor adipiscing. Proin sit amet
                                nisi ligula. Sed eu adipiscing lectus</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/2.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">David Villa - 5 Hours ago</small>
                            <br>
                            <a class="t-overflow" href="#">Suspendisse in purus ut nibh placerat Cras pulvinar euismod
                                nunc quis gravida. Suspendisse pharetra</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/3.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Harris worgon - On 15/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Maecenas venenatis enim condimentum ultrices fringilla. Nulla
                                eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar,
                                ornare turpis id</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/4.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Mitch Bradberry - On 14/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Phasellus interdum felis enim, eu bibendum ipsum tristique
                                vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel
                                blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/1.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">Nadin Jackson - On 15/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin
                                sit amet nisi ligula. Sed eu adipiscing lectus</a>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img width="40" src="{{asset('build/img/profile-pics/2.jpg')}}" alt="">
                        </div>
                        <div class="media-body">
                            <small class="text-muted">David Villa - On 16/12/2013</small>
                            <br>
                            <a class="t-overflow" href="#">Suspendisse in purus ut nibh placerat Cras pulvinar euismod
                                nunc quis gravida. Suspendisse pharetra</a>
                        </div>
                    </div>
                </div>
                <div class="media text-center whiter l-100">
                    <a href="#">
                        <small>VIEW ALL</small>
                    </a>
                </div>
            </div>
        </div>

        @yield('content')
    </section>

    <!-- Older IE Message -->
    <!--[if lt IE 9]>
    <div class="ie-block">
        <h1 class="Ops">Ooops!</h1>

        <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order
            to access the maximum functionality of this website. </p>
        <ul class="browsers">
            <li>
                <a href="https://www.google.com/intl/en/chrome/browser/">
                    <img src="{{asset('build/img/browsers/chrome.png')}}" alt="">

                    <div>Google Chrome</div>
                </a>
            </li>
            <li>
                <a href="http://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{asset('build/img/browsers/firefox.png')}}" alt="">

                    <div>Mozilla Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com/computer/windows">
                    <img src="{{asset('build/img/browsers/opera.png')}}" alt="">

                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="http://safari.en.softonic.com/">
                    <img src="{{asset('build/img/browsers/safari.png')}}" alt="">

                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                    <img src="{{asset('build/img/browsers/ie.png')}}" alt="">

                    <div>Internet Explorer(New)</div>
                </a>
            </li>
        </ul>
        <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
    </div>
    <![endif]-->
</section>

<script src="{{elixir('js/sa.js')}}" type="text/javascript"></script>

<script src="{{elixir('js/commonFunctions.js')}}" type="text/javascript"></script>

@yield('script')
</body>

</html>
