$(document).ready(function (){
    $('#submit').on('click', function(){
        var username = $('#username').val();        
        var password = $('#password').val();
        alert('korisnicko ime:'+username+' lozinka:'+password);
        $.post('../login.php', {username : username, password : password}, function(data){
            if(data == 'greska'){
               $('#poruka').text('Uneli ste pogresno korisnicko ime ili lozinku');
            }
            if(data=='ok'){
               $('#poruka').text('Uneli ste korisnicko ime ili lozinku')
            }            
        });
    });
});


