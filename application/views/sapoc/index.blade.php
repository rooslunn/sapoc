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
            <a class="brand" href="#">SAPOC</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                  Logged in as <a href="#" class="navbar-link">Username</a>
                </p>
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
    
<!--/container -->
<div class="container-fluid">
    <div class="row-fluid">
        <!--/span -->
        <div class="span3">
            <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Грузы</li>
                <!-- li class="active"><a href="#">Link</a></li-->
                <li><a href="#">Добавить груз</a></li>
                <li><a href="#">Найти ТС</a></li>
                <li class="nav-header">Транспорт</li>
                <li><a href="#">Добавить ТС</a></li>
                <li><a href="#">Найти груз</a></li>
            </ul>
            </div><!--/.well -->
        </div><!--/span-->
    </div><!--/row-->
</div><!--/container-->
    

{{ Asset::scripts() }}
</body>
</html>
