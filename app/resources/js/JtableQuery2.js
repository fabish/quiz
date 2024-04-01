$(document).ready(function() {
   
    $('button[id^="btnLock"]').click(function() {
        var button = $(this);
        var pkUser = button.attr('id').replace('btnLock', ''); 
        var locked = button.hasClass('btn-success') ? 1 : 0; 

        console.log(pkUser);
        console.log(locked);
      
        if (locked === 1) {
            button.removeClass('btn-success fa-lock').addClass('btn-danger fa-lock');
            button.attr('title', 'Desbloquear');
        } else {
            button.removeClass('btn-danger fa-unlock').addClass('btn-success fa-unlock');
            button.attr('title', 'Bloquear');
        }

        
        $.ajax({
            url: '/chesterbank/admin/check',
            method: 'POST',
            data: { pkUser: pkUser, locked: locked },
         
         
            success: function(response) {
                
            }
        });
    });
});