$(document).ready(function (){
    $('#forme-za-prijavu form').on('submit', function(e) {
        e.preventDefault();
        alert("kliknuto");
        $.post('www/login.php', $(this).serialize(), function(data) {           
             alert(data);
            if (data == 1) {
                 alert("reaguje "+data);
                window.location.href = "www/zaposleni/profil.php";
            } else if (data == 2) {
                window.location.href = "www/admin/angazovanja.php";
            } else if (data == 3) {
                window.location.href = "index.php";
            } else {
                alert(data);
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
                if(data == 1){
                alert("Vest je uspešno dodata");
                } else {
                    alert(data);
                }
            }
        });
    });
    function loadVesti(){
        $('#spisak-vesti').load('../zaposleni/load/loadVesti.php');
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
    function loadPublikacije (nacin){      
        $('#lista-publikacije').load('http://localhost/diplomski/www/load/loadPublikacije.php?redosled='+nacin);
    }
    $('#sortiranje-publikacije select').change(function (){
       var redosled = $(this).val();
        loadPublikacije(redosled);
    });
    loadPublikacije("naslov");
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
    /*$("#registracija-zaposleni").submit(function (e){
        e.preventDefault();
        alert("kliknuto");
        console.log("kliknuto");
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
           }
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
    });*/
    $("#registracija-student").submit(function (){
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
                alert("Student je uspešno dodat");
                } else {
                    alert(data);
                }
            }            
        });
    });
    //dodavanje angazovanja
    $('#forma-angazovanje').submit(function (){      
        $.post( "ajxAngazovanja.php", $(this).serialize(), function (data){
               if(data == 1){
                   alert("Angažovanje je dodato");
               } else {
                   alert(data);
               }
           });
    });
    //dodavanje obavestenja
    $("#admin-obavestenja form").submit(function (){
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
           }
           $.post( "unosObavestenja.php", $(this).serialize(), function (data){
               if(data == 1){
                   alert("Uspešno ste dodali obaveštenje");
               } else {
                   alert(data);
               }
           });
    });
    //dodavanje informacija o lab vezbama
    $('#unos-lab-vezbe form').submit(function (){
        event.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
         $.post( "insertLab.php", $(this).serialize(), function (data){
               if(data == 1){
                   alert("Uspešno ste dodali laboratorijsku vežbu");
               } else {
                   alert(data);
               }
           });
        
    });
    //dodavanje materijala lab vezbe
     $('#materijal-lab-vezbe form').submit(function (){
    var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'insertMaterijalLab.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if(data == 1){
                alert("Materijal je uspešno dodat");
                } else {
                    alert(data);
                }
            }
        });
     });
     function loadLabMaterijali(){
        $('#spisak-lab-mat').load('../zaposleni/load/loadVezbe.php');
        $('#spisak-lab-mat').on("click", "table tr td.obrisi", function(){
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
    //dodavanje publikacije
    $('#prof-publikacije form').submit(function() {
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'insertPublikacija.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    alert("Publikacija je uspešno dodata");
                } else {
                    alert(data);
                }
            }
        });
    });
    $('#azuriranje-korisnika input[name=vrsta]').change(function (){
        var vrsta = $('input[name=vrsta]:checked').val();
        if(vrsta == "zaposleni"){
           $('#azuriranje-student').hide(700);
           $('#azuriranje-zaposlen').show(700);
       } else {
            $('#azuriranje-zaposlen').hide(700);
            $('#azuriranje-student').show(700);
       }
        $.get('../admin/ajx/loadKorisnici.php', {vrsta : vrsta}, function (data){
            var korisnici = $('#azuriranje-korisnika #korisnici');
            korisnici.empty()
            for(var i=0; i<data.length; i++){
                korisnici.append($('<option>', {
                    value: data[i].id,
                    text: data[i].ime
                }));
            }
        }, "json");
    });
     $('#azuriranje-student').hide();
      $('#azuriranje-zaposlen').hide();
    $('#azuriranje-korisnika #dugme-korisnik').click(function(){
        var vrsta = $('input[name=vrsta]:checked').val();       
       var id = $('#korisnici').val();
        $.get('../admin/ajx/loadInfoKorisnik.php', {vrsta: vrsta, id: id}, function(data) {
            if (vrsta == "zaposleni") {
                $('#form-azuriranje-zaposlen input[name=id]').val(data.ID);
                $('#form-azuriranje-zaposlen input[name=ime]').val(data.ime);
                $('#form-azuriranje-zaposlen input[name=prezime]').val(data.prezime);
                $('#form-azuriranje-zaposlen input[name=username]').val(data.username);
                $('#form-azuriranje-zaposlen input[name=zvanje]').val(data['zvanje']);
                $('#form-azuriranje-zaposlen input[name=datum]').val(data['datum_isteka_ugovora']);
            } else if (vrsta == "studenti") {
                $('#form-azuriranje-student input[name=id]').val(data['ID']);
                $('#form-azuriranje-student input[name=ime]').val(data['ime']);
                $('#form-azuriranje-student input[name=prezime]').val(data['prezime']);
                $('#form-azuriranje-student input[name=username]').val(data['username']);
                $('#form-azuriranje-student input[name=indeks]').val(data['indeks']);
                $('#form-azuriranje-student input[name=tip]').val(data['tip_studija']);//proveri tip studija
                $('#form-azuriranje-student input[name=adresa]').val(data['adresa']);
                $('#form-azuriranje-student input[name=telefon]').val(data['telefon']);
            }
        }, "json"
        );
        $('#form-azuriranje-zaposlen').submit(function() {
            $.post("back/backAzuriranjeZaposlen.php", $(this).serialize(), function(data) {
                if (data == 1) {
                    alert("Uspešno ste ažurirali zaposlenog korisnika");
                } else {
                    alert(data);
                }
            });
        });
    });
    $('#form-azuriranje-student').submit(function() {
        $.post("back/backAzuriranjeStudent.php", $(this).serialize(), function(data) {
            if (data == 1) {
                alert("Uspešno ste ažurirali studenta");
            } else {
                alert(data);
            }
        });
    });
    //promena lozinke
    $('#lozinka form').on('submit', function (){
         alert("promena lozinke 1");
        event.preventDefault();
        alert("promena lozinke 2");
       $.post("backPromenaLozinke.php", $(this).serialize(), function (data){
          if(data == 1){
                alert("Lozinka je uspešno promenjena");
             } else {
                 alert(data);
             } 
       }); 
    });
});


