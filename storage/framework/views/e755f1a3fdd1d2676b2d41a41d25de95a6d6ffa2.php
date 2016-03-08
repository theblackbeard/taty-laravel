<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <noscript>
        <meta http-equiv="Refresh" content="0;   url=http://www.google.com.br">
    </noscript>
    <title>Tatiana - <?php echo $__env->yieldContent('title'); ?></title>
    

    <meta property="fb:app_id" content="293989217296609">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="http://prov.com">
    <meta property="og:site_name" content="Tatiana Souza - Designer de Interiores">
    <meta property="fb:admins" content="1037213945">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:image" content="">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta property="og:type" content="article">
    <meta property="article:author" content="">
    <meta property="article:section" content="">
    <meta property="article:tag" content="">
    <meta property="article:published_time" content="">

    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/bootstrap-submenu.min.css')); ?>">
    <link href="<?php echo e(asset('/css/jquery.tagsinput.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/magnific-popup.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/portfolio.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/perfil.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/contact.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/custom/admin.css')); ?>">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css"/>

</head>

<!--[if lt IE 9]>
<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
<script src='https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js'></script>
<![endif]-->
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin">
            <header id="topo">
            <h1>Tatiana S. Santana</h1>
            <h2>Administrativo</h2>
           </header>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="designerMenu"></li>
            <li class="menuEffect"><a href="/admin">Inicio</a></li>
            <li class="menuEffect dropdown">
                <a tabindex="0" href="#" data-toggle="dropdown" data-submenu>
                    Categoria <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="dropdown-submenu">
                          <a tabindex="0">Menu</a>
                          <ul class="dropdown-menu">
                              <li><a tabindex="0" href="/admin/menus/new">Adicionar Menu</a></li>
                              <li><a tabindex="0" href="/admin/menus">Listar Menu</a></li>
                          </ul>
                     </li>
                     <li class="dropdown-submenu">
                          <a tabindex="0">Categorias</a>
                          <ul class="dropdown-menu">
                              <li><a tabindex="0" href="/admin/categories/new">Adicionar Categoria</a></li>
                              <li><a tabindex="0" href="/admin/categories">Listar Categoria</a></li>
                          </ul>
                     </li>
                     
                </ul>
            </li>
            <li class="menuEffect"><a href="/admin/articles">Portfólio</a></li>
            <li class="menuEffect"><a href="/admin/about">Perfil</a></li>
            <li class="menuEffect dropdown">
                <a tabindex="0" href="#" data-toggle="dropdown" data-submenu>
                    Opções <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                     <li class="dropdown-submenu">
                          <a tabindex="0">Usuarios</a>
                          <ul class="dropdown-menu">
                              <li><a tabindex="0" href="/admin/users/signup">Adicionar Usuario</a></li>
                          </ul>
                     </li>
                     <li>
                       <a href="/logout">Sair</a>
                     </li>
                     
                </ul>
            </li>
            
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <footer>
    	<h1>Made by <a href="#" target="_blank" class='carv'>Carvalhos</a>| <a href="/admin" class="carv">Administrador</a></h1>
    </footer>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/bootstrap-submenu.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/custom/jquery.tagsinput.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/wow.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/jquery.magnific-popup.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/js/custom/app.js')); ?>" type="text/javascript"></script>
    <script>
     new WOW().init();
     $('[data-submenu]').submenupicker();
    </script>
    <script src="<?php echo e(asset('/js/custom/effects.js')); ?>" type="text/javascript"></script>
</body>
</html>
