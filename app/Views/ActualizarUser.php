<?php
$pkUser    = $datos[0]['pkUser'];
$fkPhone     = $datos[0]['fkPhone'];
$password    = $datos[0]['password'];
$fkLevel     = $datos[0]['fkLevel'];
$fkProfession      = $datos[0]['fkProfession'];
$status     = $datos[0]['status'];
$locked      = $datos[0]['locked'];
$inSession   = $datos[0]['inSession'];
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
							<?php echo form_open('type/actualizarUser', array('class' => 'row g-3')); ?>
    <div class="col-md-6">
        <label for="pkUser" class="form-label">pkUser</label>
        <?php echo form_input(array('name'=>'pkUser', 'id'=>'pkUser', 'class'=>'form-control', 'placeholder'=>'Enter pkUser', 'value'=>$pkUser)); ?>
    </div>
    <div class="col-md-6">
        <label for="fkPhone" class="form-label">fkPhone</label>
        <?php echo form_input(array('name'=>'fkPhone', 'id'=>'fkPhone', 'class'=>'form-control', 'placeholder'=>'Enter fkPhone', 'value'=>$fkPhone)); ?>
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter password', 'value'=>$password)); ?>
    </div>
    <div class="col-md-6">
        <label for="level" class="form-label">Level</label>
        <?php echo form_input(array('name'=>'level', 'id'=>'level', 'class'=>'form-control', 'placeholder'=>'Enter level', 'value'=>$fkLevel)); ?>
    </div>
    <div class="col-md-6">
        <label for="profession" class="form-label">Profession</label>
        <?php echo form_input(array('name'=>'profession', 'id'=>'profession', 'class'=>'form-control', 'placeholder'=>'Enter profession', 'value'=>$fkProfession)); ?>
    </div>
    <div class="col-md-6">
        <label for="status" class="form-label">Status</label>
        <?php echo form_input(array('name'=>'status', 'id'=>'status', 'class'=>'form-control', 'placeholder'=>'Enter status', 'value'=>$status)); ?>
    </div>
    <div class="col-12">
        <hr>
    </div>
    <div class="col-md-6">
        <label for="locked" class="form-label">Locked</label>
        <?php echo form_input(array('name'=>'locked', 'id'=>'locked', 'class'=>'form-control', 'placeholder'=>'Enter locked', 'value'=>$locked)); ?>
    </div>
    <div class="col-md-6">
        <label for="inSession" class="form-label">inSession</label>
        <?php echo form_input(array('name'=>'inSession', 'id'=>'inSession', 'class'=>'form-control', 'placeholder'=>'Enter inSession', 'value'=>$inSession)); ?>
    </div>
    <div class="col-12">
        <?php echo form_submit('submit', 'Actualizar', array('class'=>'btn btn-primary')); ?>
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

