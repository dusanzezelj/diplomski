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
    
    $('tr td #obrisi-mat').on('click', function (){
        $.get('brisanjeMat.php', function (data){
           if(data == 1){
              $(this).remove();
                //location.reload();
           } else {
               alert(data);
           }
        });
    });
    CKEDITOR.replace('sadrzaj-vesti');    
    $('#forma-vesti').submit(function(event){
        event.preventDefault();
        var value = CKEDITOR.instances['sadrzaj-vesti'].getData();
        $('#forma-vesti #sadrzaj').val(value); 
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'insertVesti.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                alert("Vest je uspesno dodata");
            }
        });
    });
    function loadVesti(){
        $('#spisak-vesti').load('../zaposleni/load/loadVesti.php');
        //$('#spisak-vesti table').click(function (){ 
        $('#spisak-vesti').on("click", "table tr td.obrisi", function(){
            //alert(this.parentNode.children[0].innerText);
            var id = this.parentNode.children[0].innerText;
            $.get('brisanjeVesti.php', {ID : id}, function (data){
                if(data != 1){
                    alert(data);
                }
                loadVesti();
            });            
        });
    }
    loadVesti();  
    
});


