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