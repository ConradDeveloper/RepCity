<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?= base_url('css/micss.css') ?>" rel="stylesheet">
        <title> RepoCity </title>

        <style type="text/css">
            body {
                padding-top: 100px;
                padding-bottom: 200px;
                background-color: #f5f5f5;
            }
            .navbar{
                position: absolute;

            }
            
            /* Custom container */
            .container-narrow {
              margin: 0 auto;
              max-width: 700px;
            }
            .container-narrow > hr {
              margin: 30px 0;
            }

            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }

            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
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
            <?php $this->load->view($contenido) ?>
            <br>
            <hr class="featurette-divider">

            <!-- FOOTER -->
            <footer class="footer">
                <p class="pull-right"><a href="#"><i class="icon-chevron-up"></i>Subir</a></p>
                <p>&copy; 2017 ReportCity. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>


        </div>

    </div> 
</div>
<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>