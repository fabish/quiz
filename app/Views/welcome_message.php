<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<style>
    .is-danger.help {
        color: red;
    }
</style>

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
                <li><a href="<?php echo base_url(route_to('register')); ?>">Registrar usuario</a></li>
                <li><a href="<?php echo base_url(route_to('forget')); ?>">Recuperar Contraseña</a></li>
                <li><a href="<?php echo base_url(); ?>">Inicio de sesión</a></li>
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
                <h1>Quiz</h1>
                <h3>Sistema de evaluación del estudiante</h3>
                <hr>
            </div>

            <?php if(session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php foreach(session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?= form_open(base_url(route_to('login')), ['method' => 'post', 'class' => 'form-inline']); ?>
            <div class="form-group mx-2">
                <?= form_label('Teléfono:', 'fkPhone', ['class' => 'sr-only']); ?>
                <?= form_input(['name' => 'fkPhone', 'value'=>old('fkPhone'), 'id' => 'fkPhone', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Teléfono']); ?>
                <p class="is-danger help">
                    <?= session('errors.fkPhone') ?>
                </p>
            </div>
            <div class="form-group mx-2">
                <?= form_label('Contraseña:', 'password', ['class' => 'sr-only']); ?>
                <?= form_input(['name' => 'password','value'=>old('password'), 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña']); ?>
                <p class="is-danger help">
                    <?= session('errors.password') ?>
                </p>
            </div>
            <?= form_submit('login', 'Ingresar', ['class' => 'btn btn-primary']); ?>

            <?= form_close(); ?>

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

            <p>Environment: <?= ENVIRONMENT ?></p>

        </div>

        <div class="copyrights">

            <p>&copy; <?= date('Y') ?> MTI ISC JFZS.</p>

        </div>

    </footer>
    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>
</div>
</body>
</html>