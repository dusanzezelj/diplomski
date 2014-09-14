$(document).ready(function (){
    $('#submit').on('click', function(){
        var username = $('#username').val();        
        var password = $('#password').val();
        //alert('korisnicko ime:'+username+' lozinka:'+password);
        $.post('www/login.php', {username : username, password : password}, function(data){
             $('#poruka').text(data);
            if(data == 0){
               $('#poruka').text('Uneli ste pogresno korisnicko ime ili lozinku');
            }
            else if(data == 1){
                alert("sve je dobro");
               window.location.href = "www/zaposleni/profil.php";
            }        
        });
    });
    
    $('#izbor').on('click', function (){
        var predmet = $('#izbor-predmeta').val();
        $.get('../zaposleni/editPredmet.php', {predmetID : predmet}, function (data){
            if(data != 0){
                $('#pforma input[name=sifra]').val(data['sifra_predmeta']);
                $('#pforma input[name=espb]').val(data['espb']);
                $('#uslov').val(data['ishod']);
                $('#cilj').val(data['cilj']);
            } else {
                alert("Nema podataka o predmetu");
            }
        }, 'json');
    });
});


