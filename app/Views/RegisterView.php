<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $title?>
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
                    <li><a href="<?php echo base_url(route_to('register'));?>">Registrar Usuario</a></li>
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
                        <?php echo $title?>
                    </h1>
                    <hr>
                </div>


                <!--<form action="<?php echo base_url(route_to('registerAccount'));?>" method="POST">-->
                <?= form_open(base_url(route_to('registerAccount')), ['method' => 'post', 'class' => 'form-inline']); ?>

                <div class="form-group mx-2">
                    <?= form_label('Teléfono:', 'phone', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'phone', 'value'=>old('phone'), 'id' => 'phone', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Teléfono']); ?>
                    <p class="is-danger help">
                        <?=session('errors.phone')?>
                    </p>
                </div>

                <div class="form-group mx-2">
                    <?= form_label('Confirmar Teléfono:', 'confirm_phone', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'confirm_phone','value'=>old('confirm_phone'), 'id' => 'confirm_phone', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirmar Telefono']); ?>
                   <!-- <?= form_input(['name' => 'confirm_phone', 'value'=>old('confirm_phone'), 'id' => 'confirm_phone', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirmar Teléfono']); ?>-->
                    <p class="is-danger help">
                        <?=session('errors.confirm_phone')?>
                    </p>
                </div>
                <div class="form-group mx-2">
                    <?= form_label('Matricula:', 'pkUser', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'pkUser', 'value'=>old('pkUser'), 'id' => 'pkUser', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Matricula']); ?>
                    <p class="is-danger help">
                        <?=session('errors.pkUser')?>
                    </p>
                </div>
                <div class="form-group mx-2">
                    <?= form_label('Confirmar Matricula:', 'pkUser', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'confirm_pkUser', 'value'=>old('confirm_pkUser'), 'id' => 'confirm_pkUser', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'matricula']); ?>
                    <p class="is-danger help">
                        <?=session('errors.confirm_pkUser')?>
                    </p>
                </div>

                <div class="form-group mx-2">
                    <?= form_label('Nombre:', 'name', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'name','value'=>old('name'), 'id' => 'name', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Nombre']); ?>
                    <p class="is-danger help">
                        <?=session('errors.name')?>
                    </p>
                </div>

                <div class="form-group mx-2">
                    <?= form_label('Apellido Paterno:', 'firstName', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'firstName','value'=>old('firstName'), 'id' => 'firstName', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Apellido Paterno']); ?>
                    <p class="is-danger help">
                        <?=session('errors.firstName')?>
                    </p>
                </div>

                <div class="form-group mx-2">
                    <?= form_label('Apellido Materno:', 'lastName', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'lastName','value'=>old('lastName'), 'id' => 'lastName', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Apellido Materno']); ?>
                    <p class="is-danger help">
                        <?=session('errors.lastName')?>
                    </p>
                </div>
                <?php
                helper('form');
                echo profession_select($professions, set_value('profession'));
                ?>
                
        

              <!--  <select class="form-select" aria-label="Default select example" name="profession" id="profession">
    <option selected>Select profession</option>
    <?php foreach ($professions as $profession) : ?>
        <option value="<?php echo $profession['pkProfession']; ?>"><?php echo $profession['Profession']; ?></option>
    <?php endforeach; ?>
    <p class="is-danger help">
                        <?=session('errors.profession')?>
                    </p>
</select>-->

                <div class="form-group mx-2">
                    <?= form_label('Contraseña:', 'password', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'password','value'=>old('password'), 'id' => 'password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña']); ?>
                    <p class="is-danger help">
                        <?=session('errors.password')?>
                    </p>
                </div>

                <div class="form-group mx-2">
                    <?= form_label('Confirmar Contraseña:', 'confirm_password', ['class' => 'sr-only']); ?>
                    <?= form_input(['name' => 'confirm_password','value'=>old('confirm_password'), 'id' => 'confirm_password', 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Confirmar Contraseña']); ?>
                    <p class="is-danger help">
                        <?=session('errors.confirm_password')?>
                    </p>
                </div>

                <?= form_submit('register', 'Registrarse', ['class' => 'btn btn-primary']); ?>

                <?= form_close(); ?>


                </form>
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