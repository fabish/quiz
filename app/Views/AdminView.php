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
                    <li><a href="<?php echo base_url(route_to('generar-xml'));?>">Lista en XML</a></li>
                    <li><a href="<?php echo base_url(route_to('generar-json'));?>">Lista en JSON</a></li>
                    <li><a href="#"></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url(route_to('exit')); ?>"><span class="glyphicon glyphicon-log-in"></span>Cerrar sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid text-center">
        

            <div class="col-sm-8 text-left">
                <div class="container text-left">
                    <h1>Vista de Admin</h1>
                    <hr>
                </div>

            </div>



            <!--<div class="col-sm-2 sidenav">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">

                </div>
            </div>-->
        </div>
        </div>
        <div class="container">
				<div class="row">
            <div class="col-sm-12">
			<?php echo form_open('type/crearUser', array('class' => 'row g-3')); ?>
    <div class="col-md-6">
        <label for="pkUser" class="form-label">pkUser</label>
        <?php echo form_input(array('name'=>'pkUser', 'id'=>'pkUser', 'class'=>'form-control', 'placeholder'=>'Enter pkUser')); ?>
    </div>
    <div class="col-md-6">
        <label for="fkPhone" class="form-label">fkPhone</label>
        <?php echo form_input(array('name'=>'fkPhone', 'id'=>'fkPhone', 'class'=>'form-control', 'placeholder'=>'Enter fkPhone')); ?>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <?php echo form_input(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter password')); ?>
    </div>
    <div class="col-md-6">

        <?php
helper('level_form');
echo level_select($levels, set_value('level'));
?>
    </div>
    <div class="col-md-6">
    <label for="profession" class="form-label">Profession</label>
    <?php
                helper('form');
                echo profession_select($professions, set_value('profession'));
                ?>
    </div>
    <div class="col-md-6">
        <label for="locked" class="form-label">Locked</label>
        <?php echo form_input(array('name'=>'locked', 'id'=>'locked', 'class'=>'form-control', 'placeholder'=>'Enter locked')); ?>
    </div>
    <div class="col-md-6">
        <label for="inSession" class="form-label">In Session</label>
        <?php echo form_input(array('name'=>'inSession', 'id'=>'inSession', 'class'=>'form-control', 'placeholder'=>'Enter inSession')); ?>
    </div>
    <div class="col-12">
        <?php echo form_submit('submit', 'Agregar', array('class'=>'btn btn-primary')); ?>
    </div>
<?php echo form_close(); ?>


			
            </div>
        </div>

        <hr>
		<h2>Listado de Usuarios</h2>	
		<div class="row">
			<div class="col-sm-12">
				<div class="table table-responsive">
					<table class="table table-hover table-bordered">
						<tr>
						    <th>pkUser</th>
							<th>fkPhone</th>
                            <th>password</th>
							<th>fkLevel</th>
                            <th>fkProfession</th>
                            <th>status</th>
							<th>locked</th>
							<th>inSession</th>
							<th>create_Ad</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
						<?php foreach($datos as $key):?>
							<tr>
								<td><?php echo $key->pkUser?></td>
								<td><?php echo $key->fkPhone?></td>
                                <td><?php echo $key->password?></td>
								<td><?php echo $key->fkLevel?></td>
								<td><?php echo $key->fkProfession?></td>
                                <td><?php echo $key->status?></td>
								<td><?php echo $key->locked?></td>
								<td><?php echo $key->inSession?></td>
								<td><?php echo $key->create_ad?></td>
								<td><a href="<?php echo base_url().'/type/obtenerUserNameUser/'.$key->pkUser ?>" class="btn btn-warning btn-sm">Editar</a></td>
								<td><a href="<?php echo base_url().'/type/eliminarUser/'.$key->pkUser ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
							</tr>
							<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>	

		</table>
        <form method="post" action="<?php echo base_url('/type/demo-pdf'); ?>">
    <button type="submit" class="btn btn-primary">Descargar PDF</button>
    

</form>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            
            <?php echo form_open('/type/generar-xml'); ?>
                <?php echo form_submit('submit', 'Descargar XML', array('class' => 'btn btn-success')); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>


	

	  
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