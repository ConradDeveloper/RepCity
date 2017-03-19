<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?= base_url('css/micss.css') ?>" rel="stylesheet">
        <title> RepoCity </title>
        <style>
            .thumbnails img {
                min-width: 100%;
                height: 15em;
            }

           /* .carousel-control {
                height: 80px;
                margin-top: 0;
                font-size: 120px;
                text-shadow: 0 1px 1px rgba(0,0,0,.4);
                background-color: transparent;
                border: 0;
                z-index: 10;
            }

            .carousel-caption h2,
            .carousel-caption .lead {
                margin: 0;
                line-height: 1.25;
                color: #fff;
                text-shadow: 0 1px 1px rgba(0,0,0,.4);
                
            }
            .carousel-caption .btn {
                margin-top: 10px;
            }

            .carousel img {
                min-width: 100%;
                height: 40em;
            }
            
           */
     .carousel {
      margin-bottom: 60px;
    }

    .carousel .container {
      position: relative;
      z-index: 9;
    }

    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }

    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }

    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }

           
    @media (max-width: 979px) {

      .container.navbar-wrapper {
        margin-bottom: 0;
        width: auto;
      }
      .navbar-inner {
        border-radius: 0;
        margin: -20px 0;
      }

      .carousel .item {
        height: 500px;
      }
      .carousel img {
        width: auto;
        height: 500px;
      }
    }
    
    @media (max-width: 767px) {

      .navbar-inner {
        margin: -20px;
      }

      .carousel {
        margin-left: -20px;
        margin-right: -20px;
      }
      .carousel .container {

      }
      .carousel .item {
        height: 300px;
      }
      .carousel img {
        height: 300px;
      }
      .carousel-caption {
        width: 65%;
        padding: 0 70px;
        margin-top: 100px;
      }
      .carousel-caption h1 {
        font-size: 30px;
      }
      .carousel-caption .lead,
      .carousel-caption .btn {
        font-size: 18px;
      }
    }
           

        </style>

    </head>


    <!-- NAVBAR
    ================================================== -->

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="pull-left"><img class="img-responsive" src="<?= base_url('img/logo.jpg') ?>"> </a> 
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <?= my_menu_index(); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!--Aqui viene el codigo de cada web-->
            <?php $this->load->view($contenido) ?>
            <br>
            <hr class="featurette-divider">

            <!-- FOOTER -->
            <footer>
                <p class="pull-right"><a href="#"><i class="icon-chevron-up"></i>Subir</a></p>
                <p>&copy; 2017 ReportCity. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>

        </div>

    </div> 
</div>
<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap-transition.js"></script>
<script src="../assets/js/bootstrap-alert.js"></script>
<script src="../assets/js/bootstrap-modal.js"></script>
<script src="../assets/js/bootstrap-dropdown.js"></script>
<script src="../assets/js/bootstrap-scrollspy.js"></script>
<script src="../assets/js/bootstrap-tab.js"></script>
<script src="../assets/js/bootstrap-tooltip.js"></script>
<script src="../assets/js/bootstrap-popover.js"></script>
<script src="../assets/js/bootstrap-button.js"></script>
<script src="../assets/js/bootstrap-collapse.js"></script>
<script src="../assets/js/bootstrap-carousel.js"></script>
<script src="../assets/js/bootstrap-typeahead.js"></script>

<script>

    $(document).ready(function(){
        $('#myCarousel').carousel({
            interval: 10000
        });
    });
</script>
</body>
</html>