$(document).ready(function() 
{	
	$('#btnLogin').on('click', function()
	{
		var phone    = $('#username').val();
		var password = $('#password').val();
		
		var data = [phone, password];
		sendCredentials(data);;
	});
});

function sendCredentials(data)
{
	$.ajax
	({
	   type: "POST",
	   data: {data:data},
	   url: "http://localhost/chesterbank/login/validate",
	   
	   beforeSend: function() 
	   {
         //alert(data);
       },
	   success: function(response)
	   {
		 var data = JSON.parse(response); //Es para JavaScript
		 //var data = jQuery.parseJSON(response); //Es para JQuery
			
		 if(data.respuesta == 0)
		 {
			 html = "";
			 html+= "<div class='alert alert-danger text-center' role='alert'><strong>Info!</strong> Acceso denegado</div>";

			$('#myAlert').html(html).show('linear');	 			
		 }
		 else if(data.respuesta == 1)
		 {

			 let url= "http://localhost/chesterbank";
			 switch(data.level)
			 {
               case 1:
				$(location).attr('href', url+"/admin");
              break;
              case 2:
			  $(location).attr('href', url+"/auditor");
              break;
              case 3:
				$(location).attr('href', url+"/ingeniero");
              break;
			  case 4:
				$(location).attr('href', url+"/supervisor");
              break;
			  case 5:
				$(location).attr('href', url+"/senior");
              break;
			  case 6:
				$(location).attr('href', url+"/junior");
              break;
			 }
		 }
	   }
	});
}