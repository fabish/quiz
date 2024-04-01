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
                    <h1><?php echo $tittle?></h1>
                    <hr>
                </div>

            </div>
            <div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
    <p class="text-center small">Enter your personal details to create account</p>
</div>

<div class="d-flex justify-content-center"> <!-- Div para centrar horizontalmente -->
    <?= form_open(base_url(route_to('login')), 'class="row g-3 needs-validation"'); ?>
    <div class="col-12">
        <?= form_label('Your Phone', 'yourPhone', array('class' => 'form-label')); ?>
        <?= form_input(array('type' => 'text', 'name' => 'phone', 'class' => 'form-control', 'id' => 'yourPhone', 'required' => 'required')); ?>
        <div class="invalid-feedback">Please, enter your phone!</div>
    </div>
    <div class="col-12">
        <?= form_label('Your Name', 'yourName', array('class' => 'form-label')); ?>
        <?= form_input(array('type' => 'text', 'name' => 'name', 'class' => 'form-control', 'id' => 'yourName', 'required' => 'required')); ?>
        <div class="invalid-feedback">Please, enter your name!</div>
    </div>
    <div class="col-12">
        <?= form_label('Your Firstname', 'yourFirstName', array('class' => 'form-label')); ?>
        <?= form_input(array('type' => 'text', 'name' => 'firstName', 'class' => 'form-control', 'id' => 'yourFirstName', 'required' => 'required')); ?>
        <div class="invalid-feedback">Please, enter your firstname!</div>
    </div>
    <div class="col-12">
        <?= form_label('Your Lastname', 'yourLastName', array('class' => 'form-label')); ?>
        <?= form_input(array('type' => 'text', 'name' => 'lastName', 'class' => 'form-control', 'id' => 'yourLastName', 'required' => 'required')); ?>
        <div class="invalid-feedback">Please, enter your lastname!</div>
    </div>
    <div class="col-12">
        <?= form_submit(array('class' => 'btn btn-primary w-100', 'value' => 'Create Account')); ?>
    </div>
    <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
    </div>
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
        <script>

$(document).ready(function(){
    alert ("hola mundo");  

    var pkPhone = $("#phone").val();
        var name = $("#name").val();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        
        var person = [pkPhone, name, firstName, lastName];
        alert(person);
        $.post('http://localhost/quiz/type/dataAjax',{
            pkPhone: pkPhone,
            name: name,
            firstName: firstName,
            lastName: lastName
            },
            function(datos, estado){
                console.log("los datos estan llegando 1");
                console.log("datos " + datos);
                var person = jQuery.parseJSON(datos);
                console.log("person" + person);
                console.log("despues de"+person.pkPhone);
                //$("#infoRespuesta").html(person.length);
                html = "";
                html += "<table class='table table-condensed'><thead>";
                html += "<tr><th>Phone</th><th>Name</th><th>Firstname</th><th>Lastname</th></tr>";
                html += "</thead><tbody>";
                
                    for(var i = 0; i<person.length; i++){
                        html += "<tr><td>"+person[i].pkPhone+"</td><td>"+person[i].name+"</td><td>"+person[i].firstName+"</td><td>"+person[i].lastName+"</td></tr>";
                    }
                html += "</tbody></table>";
                $("#infoRespuesta").html(html);
            
        });
    
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    alert ("hola mundo");

    $("#btn_register").click(function(){
        var pkPhone = $("#phone").val();
        var name = $("#name").val();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        
        var person = [pkPhone, name, firstName, lastName];
        alert(person);
        $.post('http://localhost/quiz/type/registerAccountAjax',{
            pkPhone: pkPhone,
            name: name,
            firstName: firstName,
            lastName: lastName
            },
            function(datos, estado){
                console.log("los datos estan llegando");
                //console.log(datos);
                var person = jQuery.parseJSON(datos);
                //console.log(person);
                console.log("despues de"+person.pkPhone);
                //$("#infoRespuesta").html(person.length);
                html = "";
                html += "<table class='table table-condensed'><thead>";
                html += "<tr><th>Phone</th><th>Name</th><th>Firstname</th><th>Lastname</th></tr>";
                html += "</thead><tbody>";
                
                    for(var i = 0; i<person.length; i++){
                        html += "<tr><td>"+person[i].pkPhone+"</td><td>"+person[i].name+"</td><td>"+person[i].firstName+"</td><td>"+person[i].lastName+"</td></tr>";
                    }
                html += "</tbody></table>";
                $("#infoRespuesta").html(html);
            
        });
    
    });
});    
</script>  

</body>

</html>