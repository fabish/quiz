<!DOCTYPE html>
<html>

<head>
    <title>Vista de Admin</title>
    
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
                    <li><a href="<?php echo base_url(route_to('admin'));?>">Lista de usuarios</a></li>
                    <li><a href="<?php echo base_url(route_to('person'));?>">Lista de personas</a></li>
                    <li><a href="#"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url(route_to('exit')); ?>"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
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
                    <h1>Vista de Admin</h1>
                    <hr>
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
        </div>
        <div class="container">
				<div class="row">
            <div class="col-sm-12">
			<?php echo form_open('/type/crear', array('class' => 'row g-3')); ?>
    <div class="col-md-6">
        <label for="pkPhone" class="form-label">pkPhone</label>
        <?php echo form_input(array('name'=>'pkPhone', 'id'=>'pkPhone', 'class'=>'form-control', 'placeholder'=>'Enter pkPhone')); ?>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <?php echo form_input(array('name'=>'name', 'id'=>'name', 'class'=>'form-control', 'placeholder'=>'Enter name')); ?>
    </div>
    <div class="col-md-6">
        <label for="firstName" class="form-label">First Name</label>
        <?php echo form_input(array('name'=>'firstName', 'id'=>'firstName', 'class'=>'form-control', 'placeholder'=>'Enter firstName')); ?>
    </div>
    <div class="col-md-6">
        <label for="lastName" class="form-label">Last Name</label>
        <?php echo form_input(array('name'=>'lastName', 'id'=>'lastName', 'class'=>'form-control', 'placeholder'=>'Enter lastName')); ?>
    </div>
    <div class="col-12">
        <?php echo form_submit('submit', 'Agregar', array('class'=>'btn btn-primary')); ?>
    </div>
<?php echo form_close(); ?>			
            </div>
        </div>

        <hr>
		<h2>Listado de Personas</h2>	
		<div class="row">
			<div class="col-sm-12">
				<div class="table table-responsive">
					<table class="table table-hover table-bordered">
						<tr>
							<th>pkPhone</th>
							<th>name</th>
							<th>firstName</th>
							<th>lastName</th>
							<th>create_ad</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
						<?php foreach($datos as $key):?>
							<tr>
								<td><?php echo $key->pkPhone?></td>
								<td><?php echo $key->name?></td>
								<td><?php echo $key->firstName?></td>
								<td><?php echo $key->lastName?></td>
								<td><?php echo $key->create_ad?></td>
								<td><a href="<?php echo base_url().'/type/obtenerUserName/'.$key->pkPhone ?>" class="btn btn-warning btn-sm">Editar</a></td>
								<td><a href="<?php echo base_url().'/type/eliminar/'.$key->pkPhone ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
							</tr>
							<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	
        <footer class="text-center">
            <div class="environment">

                <p>Page rendered in {elapsed_time} seconds</p>

                <p>Environment: <?= ENVIRONMENT ?></p>

            </div>

            <div class="copyrights">

                <p>&copy; <?= date('Y') ?>MTI ISC JFZS.</p>

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