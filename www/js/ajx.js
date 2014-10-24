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
                $('#pforma input[name=godina]').val(data['godina']);
                $('#pforma input[name=odsek]').val(data['odsek']);
                $('#pforma input[name=sifra]').val(data['sifra_predmeta']);
                $('#pforma input[name=fond]').val(data['fond_casova']);
                $('#pforma [name=vezbe]').val(data['termin_vezbe']);
                $('#pforma [name=predavanja]').val(data['termin_predavanja']);
                CKEDITOR.instances.uslov.setData( data['uslov']);
                CKEDITOR.instances.cilj.setData( data['cilj']);
                //$('#uslov').val(data['uslov']);
                //$('#cilj').val(data['cilj']);
                $("#pforma [name='id']").val(data['ID']);
            } else {
                alert("Nema podataka o predmetu");
            }
        }, 'json');
    });
    //azuriranje predmeta
    $("#pforma input[name='submit']").on('click', function (){
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
           }
           $.post( "azuriranjePredmeta.php", $( "#pforma" ).serialize(), function (data){
               if(data == 1){
                   alert("Uspešno ste ažurirali informacije o predmetu");
               } else {
                   alert(data);
               }
           });
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
    
    //CKEDITOR.replace('sadrzaj-vesti');    
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
    //azuriranje vesti
    /*function azurirajVest(){          
       alert("submitovano");
       var sadrzaj = CKEDITOR.instances['sadrzaj'].getData(); 
       var id = $("#azuriranje-vesti [name='id']").val();
       $.post('www/zaposleni/ajxAzuriranjeVesti.php', {id : id, sadrzaj : sadrzaj}, function(data){
           if(data == 1){
                alert("Vest je uspešno ažurirana");
           } else{
               alert(data);
           }           
       });      
    }*/
    $("#forma-azuriranje-vesti").submit(function(e){
        e.preventDefault();
        var sadrzaj = CKEDITOR.instances['sadrzaj'].getData(); 
       var id = $("#forma-azuriranje-vesti input[name='id']").val();
       $.post('../zaposleni/ajxAzuriranjeVesti.php', {id : id, sadrzaj : sadrzaj}, function(data){
           if(data == 1){
                alert("Vest je uspešno ažurirana");
           } else{
               alert(data);
           }           
       });      
    });
    //dodavanje zaposlenog
    $("#registracija-zaposleni").submit(function (e){
        e.preventDefault();
        alert("kliknuto");
        console.log("kliknuto");
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '../admin/registracija.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data == 1){
                alert("Zaposleni je uspešno dodat");
                } else {
                    alert(data);
                }
            }            
        });
    });
    $("#registracija-student").submit(function (){
        alert("kliknuto");
        console.log("kliknuto");
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '../admin/registracija.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data == 1){
                alert("Student je uspešno dodat");
                } else {
                    alert(data);
                }
            }            
        });
    });
    
});


