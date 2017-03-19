<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <div class="item active">
            <img class="img-responsive" src="<?= base_url('img/logociudad1.jpg') ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h2>¿Que es ReportCity?</h2>
                    <!-- boton que nos redirige  al registro el anchor es como e <a href> en html-->
                    <?= anchor('home/reportcityinfo', 'Descubrelo!', array('class' => "btn btn-large btn-primary")); ?>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" src="<?= base_url('img/ajuntament-de-barcelona.jpg') ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h2>¿Representas a un ayuntamiento y quereis usar ReportCity?</h2>
                    <br>
                    <p class="lead">Si quieres usar nuestro sistema de reporte para conocer todas las incidencias reportadas por los ciudadanos de tu localidad
                        contacta con nosotros en un solo click.</p>
                    <br>
                    <!-- boton que nos redirige  al registro el anchor es como e <a href> en html-->
                    <?= anchor('home/contactar', 'Contacta', array('class' => "btn btn-large btn-primary")); ?>
                </div>
            </div>
        </div>  
         <div class="item">
            <img class="img-responsive" src="<?= base_url('img/image3_3.jpg') ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h2>¿Te gustaria ayudar a mejorar tu localidad?.</h2>
                    <br>
                    <p class="lead">Si quieres poner solución a situaciones como estas, ¡no esperes más! colabora en la mejora de tu ciudad, registrate y participa.</p>
                    <br>
                    <!-- boton que nos redirige  al registro el anchor es como e <a href> en html-->
                    <?= anchor('home/registro', 'Registrate', array('class' => "btn btn-large btn-primary")); ?>
                </div>
            </div>
        </div>
       
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->
<br>



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->


<div class="container">
    <h3>Últimos reportes</h3>
    <ul class="thumbnails">
        
     <?php foreach($registros as $item): ?>
        <li class="span4">
            <div class="thumbnail">
                <img class="img-responsive" src="<?= base_url($item['foto_ruta']) ?>" alt="" >  
                 <h3><?php echo $item['titulo_rep']; ?></h3>
                <p><?php  echo $item['descripcion']; ?></p>
            </div>
        </li>
        <?php endforeach; ?>

    </ul>

    <!-- START THE FEATURETTES -->
    <br>
    <div class="hero-unit">


        <div class="featurette">

            <h2 class="featurette-heading">Alejandro Gándara <span class="muted">Escritor, periodista y crítico literario.</span></h2>
            <p class="lead">La diferencia entre un esclavo y un ciudadano es que el ciudadano puede preguntarse por su vida y cambiarla.</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">

            <h2 class="featurette-heading">Richard Stallman <span class="muted">Programador, conferencista, luchador social.</span></h2>
            <p class="lead">El deber de un ciudadano es no creer en ninguna profecía del futuro, sino actuar para realizar el mejor futuro posible.</p>
        </div>

        <hr class="featurette-divider">

        <div class="featurette">
            <h2 class="featurette-heading">Jean-Paul Sartre <span class="muted"> Filósofo, escritor, activista político.</span></h2>
            <p class="lead">El compromiso es un acto, no una palabra.</p>
        </div>
    </div>
