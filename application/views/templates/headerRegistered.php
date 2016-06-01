<!DOCTYPE html>
<html lang = "es">
<head>

	<meta charset="utf-8"> <!-- utf-8 permite utilizar caracteres especiales -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Para compatibilidad con internet explorer -->

	<title><?php echo $titulo ?></title>

	<!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Para que se ajuste a las resoluciones de todos los dispositivos -->
    <link type="text/css" rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css"> <!-- cargamos las css en la url principal, usando bootstrap -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>-->
	<script type="text/javascript" src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/formulario.css"/>

    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    
</head>
	<!-- <p><center>Header</center></p> -->
<body>

	<div class="container">
		<nav role="navigation" class="navbar navbar-inverse">
		        <div class="navbar-header">
		            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
		                <span class="sr-only">Menú de Navegación</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a href="#" class="navbar-brand">Logotipo</a>
		        </div>
		 
		        <div id="navbarCollapse" class="collapse navbar-collapse">
		            <ul class="nav navbar-nav">
		                <li class="active"><a href="<?=base_url() ?>">Inicio</a></li>
		                <li class="active"><a href="#">Buscar Canción</a></li>
		                <li class="active"><a href="#">Las 10 más Visitadas</a></li>
		                <li class="active"><a href="#">Mis Canciones</a></li>		                
			        </ul>
			        <ul>
			         	<li class="dropdown">
			         		<div role="Ingresar" class="navbar-form navbar-right">	
		                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;"> <?php echo $username ?> <b class="caret"></b> <span class="glyphicon glyphicon-user"></a>
                    		<ul role="menu" class="dropdown-menu">
                    			<li><a href="<?=base_url().'index.php/auth/cargar_vista' ?>">Imagen de Perfil</a></li>
								<li><a href="<?=base_url().'index.php/auth/logout'?>">Cerrar Sesión</a></li>			                                
			            </li>
            			<!-- <form role="search" class="navbar-form navbar-right"> -->
               			<div class="form-group">
                    	<!-- <input type="text" placeholder="Search" class="form-control"> -->
                    </ul>
               </div>
        	</div>
    	</nav>
	</div>

<!-- |-|-|-|-|-|-|-|-|-|-|-|-|-|-|-|-|-|-| -->


