<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $tittle?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/styleTemplate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="">Home</a></li>
                    <li><a href=""></a></li>
                    <li><a href="<?php echo base_url(route_to('register'));?>">Registrar usuario</a></li>
                    <li><a href="<?php echo base_url(route_to('forget'));?>">Recuperar Cntraseña</a></li>
                    <li><a href="<?php echo base_url();?>">Inicio de session</a></li>
                    <li><a href="#"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=" "><span class="glyphicon glyphicon-log-in"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
            </div>

            <div class="col-sm-8 text-left">
                <div class="container text-left">
                    <h1>
                        <?php echo $tittle?>
                    </h1>
                    <hr>
                </div>
                <div class="login">
                    <!--img src="..\..\public\Imagenes\logoProveedor.png" class="imagen"-->
                    <h1>¿Olvidaste tu contraseña?</h1>

                    <?php if(session('mensaje1')){ ?>
                    <div class="alert alert-danger">
                        <strong>Error!</strong> El usuario no existe.
                    </div>
                    <?php } else if (session ('mensaje')){?>
                    <div class="alert alert-success">
                        <strong>Correcto!</strong> Su contraseña ha sido modificada.
                    </div>
                    <?php } ?>
                    <!--p class="mensaje" style="color: #FFFFFF;">{error}</p-->

                    <?= helper('form'); ?>
                    <?= form_open(base_url(route_to('forgetForm')), 'name="ingreso"'); ?>
                    <p>Usuario:</p>
                    <?= form_input('fkPhone', '', 'placeholder="Usuario"'); ?>

                    <?= form_submit('submit', 'Ingresar', ['class' => 'btn btn-primary', 'class="entrar"']); ?>
                    <?= form_close(); ?>
                    <br></br>


                </div>
            </div>

            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">

                </div>
            </div>
        </div>
        <footer>
            <div class="environment">

                <p>Page rendered in {elapsed_time} seconds</p>

                <p>Environment:
                    <?= ENVIRONMENT ?>
                </p>

            </div>

            <div class="copyrights">

                <p>&copy;
                    <?= date('Y') ?>MTI ISC JFZS.
                </p>

            </div>

        </footer>

        <!-- SCRIPTS -->

        <script>
            function toggleMenu() {
                var menuItems = document.getElementsByClassName('menu-item');
                for (var i = 0; i < menuItems.length; i++) {
                    var menuItem = menuItems[i];
                    menuItem.classList.toggle("hidden");
                }
            }
        </script>

</body>

</html>