<?php
$pkPhone   = $datos[0]['pkPhone'];
$name      = $datos[0]['name'];
$firstName = $datos[0]['firstName'];
$lastName  = $datos[0]['lastName'];
?>

<!DOCTYPE html>
<html>
	<head>		
		<title><?php echo $tittle?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="./resources/css/styleTemplate.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
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
	  <li><a href="<?php echo base_url(route_to('admin'));?>">Lista de usuarios</a></li>
      <li><a href="<?php echo base_url(route_to('person'));?>">Lista de personas</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href=" <?=base_url(route_to('exit')); ?>"><span class="glyphicon glyphicon-log-in">Cerrar sesion</span></a></li>
	  </ul>
	</div>
  </div>
</nav>				
				<div class="col-sm-8 text-left"> 		  
					<div class="container text-left">		
						<h1><?php echo $tittle?></h1>
						<hr>
					</div>								 
				</div>
				<div class="container">
		<table class="table table-striped mt-4" id="table">
			<tbody>
				<tr>
				<div class="row">
							<div class="col-sm-12">
							<?php echo form_open('type/actualizar', array('class' => 'row g-3')); ?>
    <?php echo form_hidden('pkPhone', $pkPhone); ?>
    <div class="col-md-6">
        <label for="pkPhone" class="form-label">pkPhone</label>
        <?php echo form_input(array('name'=>'pkPhone', 'id'=>'pkPhone', 'class'=>'form-control', 'placeholder'=>'Enter pkPhone', 'value'=>$pkPhone)); ?>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <?php echo form_input(array('name'=>'name', 'id'=>'name', 'class'=>'form-control', 'placeholder'=>'Enter name', 'value'=>$name)); ?>
    </div>
    <div class="col-md-6">
        <label for="firstName" class="form-label">First Name</label>
        <?php echo form_input(array('name'=>'firstName', 'id'=>'firstName', 'class'=>'form-control', 'placeholder'=>'Enter firstName', 'value'=>$firstName)); ?>
    </div>
    <div class="col-md-6">
        <label for="lastName" class="form-label">Last Name</label>
        <?php echo form_input(array('name'=>'lastName', 'id'=>'lastName', 'class'=>'form-control', 'placeholder'=>'Enter lastName', 'value'=>$lastName)); ?>
    </div>
    <div class="col-12">
        <?php echo form_submit('submit', 'Actualizar', array('class'=>'btn btn-success')); ?>
    </div>
<?php echo form_close(); ?>


			</tbody>
		<table class="table table-striped mt-4" id="table">

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

