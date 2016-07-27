
	<div align="center">
        <div id="contenedor">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                    <li data-target="#myCarousel" data-slide-to="5"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner" role="listbox">
                    <div class="active item">
                    	<img  src="<?= base_url() ?>public/img/slide46.jpg" alt="slide46" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>¿Quieres compartir tu música con el mundo?</h3>
                    	</div>
                    </div>
                    <div class="item">
                    	<img  src="<?= base_url() ?>public/img/slide53.jpg" alt="slide53" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>¡Crea! ¡Comparte! ¡Haz que el mundo te escuche!</h3>
                    	</div>
                    </div>
                    <div class="item">
                    	<img  src="<?= base_url() ?>public/img/slide41.jpg" alt="slide41" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>¡Es muy fácil!</h3>
                    	</div>
                    </div>
                    <div class="item">
                    	<img  src="<?= base_url() ?>public/img/slide49.jpg" alt="slide49" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>Regístrate y accede a un mundo de lleno de música.</h3>
                    	</div>
                    </div>
                    <div class="item">
                    	<img  src="<?= base_url() ?>public/img/slide55.jpg" alt="slide55" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>Tendrás acceso al mejor repositorio de canciones jamás conocido</h3>
                    	</div>
                    </div>
                    <div class="item">
                    	<img  src="<?= base_url() ?>public/img/slide57.jpg" alt="slide57" class="img-responsive" />
                    	<div class="carousel-caption hidden-xs hidden-sm">
                    		<h3>¿Qué esperas? ¡INGRESA Y HAZ QUE EL MUNDO SEPA QUIÉN ERES TÚ!</h3>
                    	</div>
                    </div>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" role="button" data-slide="prev">
                	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                	<span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control right" href="#myCarousel" role="button" data-slide="next">
                	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                	<span class="sr-only">Siguiente</span>
                </a>
                <!-- <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a> -->
            </div>


    <div align="center">
    	 <!-- filas de imágenes -->
	  <div align="center"class="row">
	   <div class="col-lg-3">
	   	<div class="thumbnail">
	   	 <img src="<?= base_url() ?>public/img/slide30.jpg" alt="slide30" class="img-responsive" />
	   	  <div class="caption">
	   	  	<h3>¡Registrate!</h3>
	   	  	<!-- <p>...</p>
	   	  	<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p> -->
	   	  </div>		
	   	</div>
	   </div>	

	   <div class="col-lg-3">
	   	<div class="thumbnail">
	   	 <img src="<?= base_url() ?>public/img/slide27.jpg" alt="slide27" class="img-responsive" />
	   	  <div class="caption">
	   	  	<h3>¡Crea!</h3>
	   	  	<!-- <p>...</p>
	   	  	<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p> -->
	   	  </div>		
	   	</div>
	   </div>	  	

	   <div class="col-lg-3">
	   	<div class="thumbnail">
	   	 <img src="<?= base_url() ?>public/img/slide23.jpg" alt="slide23" class="img-responsive" />
	   	  <div class="caption">
	   	  	<h3>¡Disfruta!</h3>
	   	  	<!-- <p>...</p>
	   	  	<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p> -->
	   	  </div>		
	   	</div>
	   </div>	  	

	   <div class="col-lg-3">
	   	<div class="thumbnail">
	   	 <img src="<?= base_url() ?>public/img/slide26.jpg" alt="slide26" class="img-responsive" />
	   	  <div class="caption">
	   	  	<h3>¡Comparte!</h3>
	   	  	<!-- <p>...</p>
	   	  	<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p> -->
	   	  </div>		
	   	</div>
	   </div>	  	
    	
    </div>
    <div>
        <!-- <script src="js/jquery.js"></script> -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.myCarousel').carousel({
                    interval: 1
                });
            });
        </script>
    </div>
</body>  
</html>
