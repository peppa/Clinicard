/* ------------------------------------------------*/
/*               disclaimer cookie                 */
/* ------------------------------------------------*/

$(document).ready(function(){showCookieDisclaimer()});

function showCookieDisclaimer(){
    if ( navigator.cookieEnabled===true ){
        if ($.cookie("cookieAccepted")!=="true"){
            $('#cookie-bar').slideDown();
        }
    }
}

$(document).on('click','#cookie-accepted',function(){hideCookieDisclaimer()});

function hideCookieDisclaimer(){
    $('#cookie-bar').fadeOut();
    $.cookie("cookieAccepted","true",{expires: 100}); //100 giorni
}


/* ------------------------------------------------*/
/*                 stampa report                   */
/* ------------------------------------------------*/

$(document).on('click','.checkbox-field,#select-all',function(){activateReportButton()});

function activateReportButton(){
    check=false;
    $('.checkbox-field').each(function(){
        if (this.checked===true){
            check=true;
        }
    });
    if (check===true){
        $('#printReport').removeClass("disabled");
        $('#printReport').removeAttr("disabled");
    }
    else { //altrimenti una volta attivato il bottone lo resta sempre
        $('#printReport').addClass("disabled");
        $('#printReport').attr("disabled","disabled");
    }
}

$(document).ready(function(){ //spunta tutti i checkbox
        $('#select-all').click(function() {
            if(this.checked){
                $('.checkbox-field').each(function(){
                    this.checked=true;
                });
            }
            else{
                $('.checkbox-field').each(function(){
                    this.checked=false;
                });
            }
        });
        });
        

/* ------------------------------------------------*/
/*              prefill modPatient                 */
/* ------------------------------------------------*/

$(document).ready(function(){
    if ( window.location.href.match(/modPat/)){ //non serve se lo script viene diviso
        
    urlString=window.location.href; //prende l'url della pagina corrente
    splitUrlArray = urlString.split('='); //divide l'url in base al carattere specificato
    var EncCF=splitUrlArray[3]; //prende l'ultimo elemento dell'array (md5 del codice fiscale)
    
    $.ajax({
        type: "POST",
        url: "index.php?control=ajaxCall&task=preFillPat",
        dataType: "json",
        data: {"cf":EncCF},
        success: function(array){
            $('#name').val(array["name"]);
            $('#surname').val(array["surname"]);
            $('#dateB').val(array["dateB"]);
            $('#CF').val(array["CF"]);
            if (array["gender"]==="M"){
                 $(':radio[value="M"]').attr('checked', 'checked');
            }
            else {
                $(':radio[value="F"]').attr('checked', 'checked');
            }
        }
    });
}
});

/* ------------------------------------------------*/
/*               prefill modCheck                  */
/* ------------------------------------------------*/

$(document).ready(function(){
    if ( window.location.href.match(/modCheck/)){ //non serve se lo script viene diviso
        var EncCF=window.location.href.split('p=')[1].split('&')[0];
        var EncCH=window.location.href.split('ch=')[1];
        $.ajax({
            type: "POST",
            url: "index.php?control=ajaxCall&task=preFillCheck",
            dataType: "json",
            data: {"cf":EncCF,"ch":EncCH},
            success: function(array){
            $('#dateC').val(array["dateCh"]);
            $('#medH').val(array["medHistory"]);
            $('#medE').val(array["medExam"]);
            $('#conc').val(array["conclusions"]);
            $('#toDoE').val(array["toDoExam"]);
            $('#ter').val(array["terapy"]);
            $('#check').val(array["checkup"]);
        }
        })
    }
});

/* ------------------------------------------------*/
/*       validazione form registrazione            */
/* ------------------------------------------------*/

$(document).on("keyup change", "#password,#password-repeat", function(){passwordMatch()});

//function validaPassword(){
//    $("#password,#password-repeat").on("keyup change", function() {
//        passwordMatch();        
//    });
//}

$(document).ready(function(){
    if ( window.location.href.match(/Registration/)){ //non serve se viene diviso il file
        $("#password").on("keyup change", function() {
            var password = this.value;
            checkStrength(password);
            $('#pass-strength').show();
            $('#pass-strength').text(result);
    });
    }
});

function checkStrength(password){
    var totStrength=0;
    if (password.length>4){
        totStrength++;
    }
    if (password.length>10){
        totStrength++;
    }
    if (password.match(/\d/)){ //numeri
        totStrength++;
    }
    if (password.match(/\s/)){//spazi vuoti
        totStrength++;
    }
    if (password.match(/[A-Z]/)){//lettere maiuscole
        totStrength++;
    }
    
    if (totStrength===0){
        result="password non valida";
        $('#pass-strength').css({"border-color":"#FF0000","background-color":"#F75D59"});
    }
    else if (totStrength===1){
        result="sicurezza password: molto debole";
        $('#pass-strength').css({"border-color":"#FF0000","background-color":"#F75D59"});
    }
    else if (totStrength===2){
        result="sicurezza password: debole";
        $('#pass-strength').css({"border-color":"#F88017","background-color":"#FF7F50"});
    }
    else if (totStrength===3){
        result="sicurezza password: media";
        $('#pass-strength').css({"border-color":"#F88017","background-color":"#FF7F50"});
    }
    else if (totStrength===4){
        result="sicurezza password: forte";
        $('#pass-strength').css({"border-color":"#00FF00","background-color":"#BCE954"});
    }
    else if (totStrength===5){
        result="sicurezza password: molto forte";
        $('#pass-strength').css({"border-color":"#00FF00","background-color":"#BCE954"});
    }
}

function passwordMatch(){
    var pass1=$('#password').val();
    var pass2=$('#password-repeat').val();
    
    if (pass1!=="" && pass2!=="" && pass1===pass2){
        $('#pass-match').hide();
        $("#password").addClass("input-field-ok");
        $("#password-repeat").addClass("input-field-ok");
    }
    else {
        $("#password").removeClass("input-field-ok");
        $("#password-repeat").removeClass("input-field-ok");
        $('#pass-match').show();
        $('#pass-match').text("Le due password non coincidono");
        $('#pass-match').addClass("input-message-error");
    }
}



$(document).on('blur', "#username", function() { validateUsername()}); 

function validateUsername(){
	var user = $("#username").val();
	if(user === ''){
            $('#username-err').show();
            $("#username-err").text("Inserisci un username");
            $("#username").removeClass("input-field-ok");
            $('#username-err').addClass("input-message-error");
	} 
        else{
		checkUsernameOnDatabase(user);
	}
}

function checkUsernameOnDatabase( username ) {
	$.ajax({
		type: "POST",
		url: "index.php?control=ajaxCall&task=checkUsername",
		dataType: "json",
                data: {"user":username},
                complete: function(result){
                    JSON.stringify(result);
                    if ( result.responseText==="false"){
                        $('#username-err').hide();
                        $('#username').addClass("input-field-ok");
                    }
                    else if ( result.responseText==="true") {
                        var message="username non disponibile";
                        $('#username').removeClass("input-field-ok");
                        $('#username-err').addClass("input-message-error");
                        $('#username-err').text(message);
                        $('#username-err').show();
                    }
                }
	});
}

$(document).ready(function(){ //fa il reset di tutit i campi 
    $('#reset').click(function(){
        $('*').removeClass("input-field-ok"); //rimuove i bordi verdi da tutti i campi
        $('.no-input,#pass-strength,#pass-match').hide(); //nasconde tutti i messaggi di info/errore sotto ai campi
    });
});

$(document).on('blur',"#nameReg",function(){validateName()});

function validateName(){
    var name=$('#nameReg').val();
    if (name===""){
        var message="Inserisci il tuo nome";
        $("#nameReg").removeClass("input-field-ok");
        $('#name-err').addClass("input-message-error");
        $('#name-err').text(message);
        $('#name-err').show();
    }
    else if(name.match(/[^A-Za-z\s\']/)){ //lettere upp e low, spazi, apostrofo
        var message="Il nome puo' contenere solo lettere e spazi";
        $("#nameReg").removeClass("input-field-ok");
        $('#name-err').addClass("input-message-error");
        $('#name-err').text(message);
        $('#name-err').show();
    }
    else {
        $("#nameReg").addClass("input-field-ok");
        $('#name-err').hide();
    }
}

$(document).on('blur',"#surnameReg",function(){validateSurname()});

function validateSurname(){
    var surname=$('#surnameReg').val();
    if (surname===""){
        var message="Inserisci il tuo cognome";
        $("#surnameReg").removeClass("input-field-ok");
        $('#surname-err').addClass("input-message-error");
        $('#surname-err').text(message);
        $('#surname-err').show();
    }
    else if(surname.match(/[^A-Za-z\s\']/)){ //lettere upp e low, spazi, apostrofo
        var message="Il cognome puo' contenere solo lettere e spazi";
        $("#surnameReg").removeClass("input-field-ok");
        $('#surname-err').addClass("input-message-error");
        $('#surname-err').text(message);
        $('#surname-err').show();
    }
    else {
        $("#surnameReg").addClass("input-field-ok");
        $('#surname-err').hide();
    }
}

$(document).on('blur',"#cfReg",function(){validateCF()});

function validateCF(){
    var cf=$('#cfReg').val();
    if (cf===""){
        var message="Inserisci il tuo codice fiscale";
        $("#cfReg").removeClass("input-field-ok");
        $('#cf-err').addClass("input-message-error");
        $('#cf-err').text(message);
        $('#cf-err').show();
    }
    else if(cf.match(/[^A-Z0-9]/)){ //lettere maiuscole e numeri
        var message="Il codice fiscale puo' contenere solo lettere maiuscole e numeri";
        $("#cfReg").removeClass("input-field-ok");
        $('#cf-err').addClass("input-message-error");
        $('#cf-err').text(message);
        $('#cf-err').show();
    }
    else if(cf.length!==16){
        var message="Il codice fiscale deve essere di 16 cifre";
        $("#cfReg").removeClass("input-field-ok");
        $('#cf-err').addClass("input-message-error");
        $('#cf-err').text(message);
        $('#cf-err').show();
    }
    else {
        $("#cfReg").addClass("input-field-ok");
        $('#cf-err').hide();
    }
}

$(document).on('blur',"#email",function(){validaEmail()});

function validaEmail(){
    var email=$('#email').val();
    //var emailChars=new RegExp("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+[\.]([a-z0-9-]+)*([a-z]{2,3})$")
    if (email===""){
        var message="inserisci la tua email";
        $('#email').removeClass("input-field-ok");
        $('#email-err').addClass("input-message-error");
        $('#email-err').text(message);
        $('#email-err').show();
    }
//    else if (email.search(emailChars)){
//        var message="il formato dell'email non e' corretto";
//        $('#email').removeClass("input-field-ok");
//        $('#email-err').addClass("input-message-error");
//        $('#email-err').text(message);
//        $('#email-err').show();
//    }
    else {
        checkEmailOnDatabase(email);
    }
}

function checkEmailOnDatabase(email){
    $.ajax({
		type: "POST",
		url: "index.php?control=ajaxCall&task=checkEmail",
		dataType: "json",
                data: {"mail":email},
                complete: function(result){
                    JSON.stringify(result);
                    if ( result.responseText==="false"){
                        $('#email-err').hide();
                        $('#email').addClass("input-field-ok");
                    }
                    else if ( result.responseText==="true") {
                        var message="questo indirizzo email e' gia' in uso";
                        $('#email').removeClass("input-field-ok");
                        $('#email-err').addClass("input-message-error");
                        $('#email-err').text(message);
                        $('#email-err').show();
                    }
                }
});
}

$(document).on('blur',':text,:password',function(){activateButtonReg()}); //attivata ogni volta che si lascia un input type text o password

function activateButtonReg(){
    completed=isFormRegCompleted();
    if (completed===true) {
        $('#registration-button').removeAttr("disabled");
        $('#registration-button').removeClass("disabled");        
    }
}

function isFormRegCompleted(){
    var completed = false;

    if (window.location.href.match(/Registration/)){ //questo comando non serve se il file viene caricato solo per la pagina Registrazione
	if($("#nameReg").val().length > 0 && 
	   $("#surnameReg").val().length > 0 &&
	   $("#username").val().length > 0 &&
           $("#cfReg").val().length > 0 &&
           $("#email").val().length > 0 &&
	   $("#password").val().length > 0 &&
	   $("#password-repeat").val().length > 0)
	{
		completed = true;
	}

	return completed;
    }
}


/* ------------------------------------------------*/
/*            controllo ultima visita              */
/* ------------------------------------------------*/

//il file va richiamato quando viene caricato il tpl confirmDelCheck

$(document).ready(function(){
    if (window.location.href.match(/delCheck/)){ //non serve se viene diviso il file
        checkLastVisit();
    }
});

function checkLastVisit(){
    var encCF=window.location.href.split('p=')[1].split('&')[0];
    
    $.ajax({
        type: "POST",
        url: "index.php?control=ajaxCall&task=checkLastVisit",
        dataType: "json",
        data: {"encCF":encCF},
        success: function(result){
            //numResult=JSON.stringify(result).responseJSON;
            if (result["num"]===1){
                $('#last-check').show();
            }
        }
    });
}



/* ------------------------------------------------*/
/*         validazione inserimento pazienti        */
/* ------------------------------------------------*/

$(document).on('blur','#nameDB',function(){validateNameDB()});

function validateNameDB(){
    var name=$('#nameDB').val();
    
    if (name===""){
        var message="Inserisci il nome del paziente";
        $("#nameDB").removeClass("input-field-ok");
        $('#name-err-DB').addClass("input-message-error");
        $('#name-err-DB').text(message);
        $('#name-err-DB').show();
    }
    else if(name.match(/[^A-Za-z\s\']/)){
        var message="Il nome puo' contenere solo lettere e spazi";
        $("#nameDB").removeClass("input-field-ok");
        $('#name-err-DB').addClass("input-message-error");
        $('#name-err-DB').text(message);
        $('#name-err-DB').show();
    }
    else {
        $("#nameDB").addClass("input-field-ok");
        $('#name-err-DB').hide();
    }
}

$(document).on('blur',"#surnameDB",function(){validateSurnameDB()});

function validateSurnameDB(){
    var cognome=$('#surnameDB').val();
    if (cognome===""){
        var message="Inserisci il cognome del paziente";
        $("#surnameDB").removeClass("input-field-ok");
        $('#surname-err-DB').addClass("input-message-error");
        $('#surname-err-DB').text(message);
        $('#surname-err-DB').show();
    }
    else if(cognome.match(/[^A-Za-z\s\']/)){
        var message="Il cognome puo' contenere solo lettere e spazi";
        $("#surnameDB").removeClass("input-field-ok");
        $('#surname-err-DB').addClass("input-message-error");
        $('#surname-err-DB').text(message);
        $('#surname-err-DB').show();
    }
    else {
        $("#surnameDB").addClass("input-field-ok");
        $('#surname-err-DB').hide();
    }
}

$(document).on('blur','#dateBirthDB',function(){valiDateBirthDB()});

function valiDateBirthDB(){
    var date=$('#dateBirthDB').val();
    
    if (date===""){
        var message="Inserisci la data di nascita completa del paziente";
        $("#dateBirthDB").removeClass("input-field-ok");
        $('#dateB-err-DB').addClass("input-message-error");
        $('#dateB-err-DB').text(message);
        $('#dateB-err-DB').show();
    }
    else{
        //var day=$('#dateBirthDB').val().split('-')[2];
        //var month=$('#dateBirthDB').val().split('-')[1];
        var year=$('#dateBirthDB').val().split('-')[0];
        
        if (year>2100 || year<1900){
            //se uso input type date il controllo su giorno e mese non serve
            var message="il formato della data non e' corretto";
            $("#dateBirthDB").removeClass("input-field-ok");
            $('#dateB-err-DB').addClass("input-message-error");
            $('#dateB-err-DB').text(message);
            $('#dateB-err-DB').show();
        }
        else{
            $('#dateB-err-DB').hide();
            $("#dateBirthDB").addClass("input-field-ok");
        }
    }
}

$(document).on('blur',"#cfDB",function(){validateCfDB()});

function validateCfDB(){
    var cf=$('#cfDB').val();
    if (cf===""){
        var message="Inserisci il codice fiscale del paziente";
        $("#cfDB").removeClass("input-field-ok");
        $('#cf-err-DB').addClass("input-message-error");
        $('#cf-err-DB').text(message);
        $('#cf-err-DB').show();
    }
    else if(cf.match(/[^A-Z0-9]/)){
        var message="Il codice fiscale puo' contenere solo lettere maiuscole e numeri";
        $("#cfDB").removeClass("input-field-ok");
        $('#cf-err-DB').addClass("input-message-error");
        $('#cf-err-DB').text(message);
        $('#cf-err-DB').show();
    }
    else if(cf.length!==16){
        var message="Il codice fiscale deve essere di 16 cifre";
        $("#cfDB").removeClass("input-field-ok");
        $('#cf-err-DB').addClass("input-message-error");
        $('#cf-err-DB').text(message);
        $('#cf-err-DB').show();
    }
    else {
        checkCFonDatabase(cf);
    }
}

function checkCFonDatabase(cf){
    $.ajax({
		type: "POST",
		url: "index.php?control=ajaxCall&task=checkCF",
		dataType: "json",
                data: {"cf":cf},
                complete: function(result){
                    JSON.stringify(result);
                    if ( result.responseText==="true" ){
                        var message="Esiste gia' un paziente con questo codice fiscale nell'archivio";
                        $('#cfDB').removeClass("input-field-ok");
                        $('#cf-err-DB').addClass("input-message-error");
                        $('#cf-err-DB').text(message);
                        $('#cf-err-DB').show();                        
                    }
                    else{
                        $('#cf-err-DB').hide();
                        $('#cfDB').addClass("input-field-ok");
                    }
                }
	});
}
    

$(document).on('blur','#dateCheckDB',function(){valiDateCheckDB()});

function valiDateCheckDB(){
    var date=$('#dateCheckDB').val();
    
    if (date===""){
        var message="Inserisci la data della visita";
        $("#dateCheckDB").removeClass("input-field-ok");
        $('#dateC-err-DB').addClass("input-message-error");
        $('#dateC-err-DB').text(message);
        $('#dateC-err-DB').show();
    }
    else{
        //var day=$('#dateCheckDB').val().split('-')[2];
        //var month=$('#dateCheckDB').val().split('-')[1];
        var year=$('#dateCheckDB').val().split('-')[0];
        
        if (year>2100 || year<1900){
            //se uso input type date il controllo su giorno e mese non serve
            var message="il formato della data non e' corretto";
            $("#dateCheckDB").removeClass("input-field-ok");
            $('#dateC-err-DB').addClass("input-message-error");
            $('#dateC-err-DB').text(message);
            $('#dateC-err-DB').show();
        }
        else{
            $('#dateC-err-DB').hide();
            $("#dateCheckDB").addClass("input-field-ok");
        }
    }
}

$(document).on('blur','.input-area',function(){validateAreas()});

function validateAreas(){ //tutti i campi textarea sono facoltativi
    $('.input-area').each(function(){
        if ($(this).val()!==""){
            $(this).addClass("input-field-ok");
        }
        else {
            $(this).removeClass("input-field-ok");
        }
    });
}

$(document).on('blur','.input-field',function(){activateButtonInsPat()});

function activateButtonInsPat(){
    completed=checkFormCompletedPat();
    if (completed===true) {
        $('#insertNew').removeAttr("disabled");
        $('#insertNew').removeClass("disabled");        
    }
}

function checkFormCompletedPat(){
    var completed = false;

    if (window.location.href.match(/insert/)){ //questo comando non serve se il file viene caricato solo per la pagina iserimento pazienti
	if($("#nameDB").val().length > 0 && 
	   $("#surnameDB").val().length > 0 &&
	   $("#dateBirthDB").val().length > 0 &&
           $("#cfDB").val().length > 0 &&
           $("#dateCheckDB").val().length > 0)
	{
		completed = true;
	}

	return completed;
    }
}

/* ------------------------------------------------*/
/*         validazione inserimento visita         */
/* ------------------------------------------------*/

$(document).on('blur','#dateChDB',function(){valiDateChDB()});

function valiDateChDB(){
    var date=$('#dateChDB').val();
    
    if (date===""){
        var message="Inserisci la data della visita";
        $("#dateChDB").removeClass("input-field-ok");
        $('#dateCh-err-DB').addClass("input-message-error");
        $('#dateCh-err-DB').text(message);
        $('#dateCh-err-DB').show();
    }
    else{
        //var day=$('#dateChDB').val().split('-')[2];
        //var month=$('#dateChDB').val().split('-')[1];
        var year=$('#dateChDB').val().split('-')[0];
        
        if (year>2100 || year<1900){
            //se uso input type date il controllo su giorno e mese non serve
            var message="il formato della data non e' corretto";
            $("#dateChDB").removeClass("input-field-ok");
            $('#dateCh-err-DB').addClass("input-message-error");
            $('#dateCh-err-DB').text(message);
            $('#dateCh-err-DB').show();
        }
        else{
            $('#dateCh-err-DB').hide();
            $("#dateChDB").addClass("input-field-ok");
        }
    }
}

// Finche tutti gli script stanno sullo stesso file quello di inerisci paziente
// funziona anche per inserisci visita

//$(document).on('blur','.input-area',function(){validateAreas()});
//
//function validateAreas(){ //questi campi sono facoltativi
//    $('.input-area').each(function(){
//        if ($(this).val()!==""){
//            $(this).addClass("input-field-ok");
//        }
//        else {
//            $(this).removeClass("input-field-ok");
//        }
//    });
//}

$(document).on('blur','#dateChDB',function(){activateButtonInsCh()});

function activateButtonInsCh(){
    completed=checkFormCompletedCh();
    if (completed===true) {
        $('#insertNewCh').removeAttr("disabled");
        $('#insertNewCh').removeClass("disabled");        
    }
}

function checkFormCompletedCh(){
    var completed = false;

    if (window.location.href.match(/newVisit/)){ //questo comando non serve se il file viene diviso in più file
	if($("#dateChDB").val().length > 0)
	{
		completed = true;
	}

	return completed;
    }
}

/* ------------------------------------------------*/
/*                controllo cookie                 */
/* ------------------------------------------------*/

//funziona solo se javascript è attivato nel browser, ma se è disattivato
// viene mostrato l'avviso 

$(document).ready(function(){checkCookiesEnabled()});

function checkCookiesEnabled(){
    if (navigator.cookieEnabled===false){
        $('#cookie-disabled').show();
    }
    else {
        $('#cookie-disabled').hide();
    }
}


/* ------------------------------------------------*/
/*                     login                       */
/* ------------------------------------------------*/

//$(document).ready(function(){addLoginBox()});
//
//function addLoginBox(){
//    $.ajax({
//            type: "GET",
//            url: "index.php?control=ajaxCall&task=checkLoggedIn",
//            dataType: "json",
//            complete: function(result){
//                if (result.responseJSON===false){
//                    $("#loginBox").load('./Smarty_dir/templates/login.tpl');
//                }
//                else {
//                    $("#loginBox").load('./Smarty_dir/templates/loggedIn.tpl');
//                    //$('#show-username').html("Ciao "+result.responseJSON);
//                }
//            }
//    });
//}
//
//$(document).on('click','#login',function(){handleLogin()});
//
//function handleLogin(){
//    var username=$('#userLogin').val();
//    var password=$('#passLogin').val();
//    if ($('#rememberLogin').prop('checked')===true){
//        var remember=true;
//    }
//    else {
//        var remember=false;
//    }
//    
//    $.ajax({
//            type: "GET",
//            url: "index.php?control=ajaxCall&task=login",
//            dataType: "json",
//            data: {"user":username,"pass":password,"remember":remember},
//            complete: function(){
//                $("#loginBox").load('./Smarty_dir/templates/loggedIn.tpl');
//            }
//    })
//}
//
//$(document).on('click','#logout',function(){handleLogout()});
//
//function handleLogout(){
//    $.ajax({
//            type: "GET",
//            url: "index.php?control=ajaxCall&task=logout",
//            complete: function(){
//                $("#loginBox").load('./Smarty_dir/templates/login.tpl');
//            }
//    })
//}
//
//$(document).ready(function(){
//   $('#shoe-username').html("SPLASH"); 
//});
