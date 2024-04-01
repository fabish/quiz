$(document).ready(function(){
    console.log("dentro");
    $("#btn_register").click(function(){
        let phone = $("#phone").val();
        let name = $("#name").val();
        let firstName = $("#firstName").val();
        let lastName = $("#lastName").val();
        let username = $("#username").val();
        let password = $("#password").val();
        console.log(valor);
        $.ajax({
            type: 'POST',
            url: base_url + "",
            dataType: 'json',
            data: {
                phone: phone,
                name: name,
                firstName: firstName,
                lastName: lastName,
                username: username,
                password: password
            },
            success: function(dato){
                console.log(dato);
                let resultado = JSON.stringify(dato);
                $("#div_result").text(resultado);
            }
        });
    });
});
