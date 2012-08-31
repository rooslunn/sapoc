<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SAPOC project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	{{ Asset::styles() }}
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
</head>
<body>

<!-- Navigator -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            	<span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"><strong>SAPOC</strong></a>
            <div class="nav-collapse collapse">
                <!--p class="navbar-text pull-right">Logged in as <a href="#" class="navbar-link">Username</a></p-->
                <ul class="nav">
                    <li><a href="/">Home</a></li>
<!--
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
-->
                </ul>
                <ul class="nav pull-right">
                    @section('login')
                    @if (Auth::guest())
                        <li>{{ HTML::link_to_action('sapoc@login', __('form-main.login')) }}</li>
                        <li>{{ HTML::link_to_action('sapoc@verify', __('form-main.register')) }}</li>
                    @else
                        <li><a href="#">{{ __('index-full.logged-as') . ' ' . Auth::user()->email }}</a></li>
                        <li>{{ HTML::link('logout', __('index-full.logout')) }}</li>
                    @endif    
                    @yield_section
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
    
<!--/container -->
<div class="container-fluid">
    <div class="row-fluid">
    
        <!--/span2 -->
        <div class="span2">
            <div class="well sidebar-nav">
            <ul class="nav nav-list">
                @section('menu')
                <li class="nav-header">Freight</li>
                <!-- li class="active"><a href="#">Link</a></li-->
                <li><a href="#">Add</a></li>
                <li><a href="#">Find</a></li>
                <li class="nav-header">Transport</li>
                <li><a href="#">Add</a></li>
                <li><a href="#">Find</a></li>
                @yield_section
                
                @if (Auth::guest())
                    @yield('locked_menu')
                @else
                    <li class="nav-header">User</li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Bids</a></li>
                @endif
            </ul>
            </div><!--/.well -->
        </div><!--/span2-->
        
        <!--/span10 -->
        <div class="span10">
            @yield('content')
        </div><!--/span10-->
        
    </div><!--/row-->
</div><!--/container-->
    
{{ Asset::scripts() }}
</body>
</html>
