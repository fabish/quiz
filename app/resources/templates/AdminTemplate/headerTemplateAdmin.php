<nav class="navbar navbar-inverse">
	<div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>                        
	  </button>
	  <a class="navbar-brand" href="#">Logo<?php echo $_SESSION['authUser']['pkPhone']." ".$_SESSION['authUser']['name'];?></a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
	  <ul class="nav navbar-nav">
		<li class="active"><a href="/chesterbank/admin">Home</a></li>
		<li><a href="/chesterbank/level">Agregar nivel</a></li>
		<li><a href="#">Projects</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="/chesterbank/users">Edicion</a></li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href=" http://localhost/chesterbank/login/logout"><span class="glyphicon glyphicon-log-in">Salir</span></a></li>
	  </ul>
	</div>
  </div>
</nav>
	

