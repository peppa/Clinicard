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
        

$(document).ready(function(){ //riempie i campi del template modPatient
    //if ( window.location.href.split("action=")[1].split('&')[0]==="modPat"){
    if ( window.location.href.match(/modPat/)){
        
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

$(document).ready(function(){ //riempie i campi del template modPatient
    //if ( window.location.href.split("action=")[1].split('&')[0]==="modCheck"){
    if ( window.location.href.match(/modCheck/)){
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

$(document).on("keyup change", "#password,#password-repeat", function(){passwordMatch()});

//function validaPassword(){
//    $("#password,#password-repeat").on("keyup change", function() {
//        passwordMatch();        
//    });
//}

$(document).ready(function(){
    if ( window.location.href.match(/Registration/)){
        $("#password").on("keyup change", function() {
            var password = this.value;
            checkStrength(password);
            $('#pass-strength').removeAttr('hidden');
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
        //$('#pass-strength').switchClass(".pass-medium",".pass-weak");
    }
    else if (totStrength===1){
        result="sicurezza password: molto debole";
        $('#pass-strength').css({"border-color":"#FF0000","background-color":"#F75D59"});
        //$('#pass-strength').switchClass(".pass-medium",".pass-weak");
    }
    else if (totStrength===2){
        result="sicurezza password: debole";
        $('#pass-strength').css({"border-color":"#F88017","background-color":"#FF7F50"});
        //$('#pass-strength').switchClass(".pass-medium",".pass-weak");
    }
    else if (totStrength===3){
        result="sicurezza password: media";
        $('#pass-strength').css({"border-color":"#F88017","background-color":"#FF7F50"});
        //$('#pass-strength').switchClass(".pass-weak",".pass-medium");
    }
    else if (totStrength===4){
        result="sicurezza password: forte";
        $('#pass-strength').css({"border-color":"#00FF00","background-color":"#BCE954"});
        //$('#pass-strength').switchClass(".pass-weak",".pass-strong");
    }
    else if (totStrength===5){
        result="sicurezza password: molto forte";
        $('#pass-strength').css({"border-color":"#00FF00","background-color":"#BCE954"});
        //$('#pass-strength').switchClass(".pass-weak",".pass-strong");
    }
}

function passwordMatch(){
    var pass1=$('#password').val();
    var pass2=$('#password-repeat').val();
    
    if (pass1!=="" && pass2!=="" && pass1===pass2){
        //$('#pass-match').removeAttr('hidden');
        //$('#pass-match').text("Le due password coincidono");
        //$('#pass-match').css({"border-color":"#00FF00","background-color":"#BCE954"});
        $('#pass-match').hide();
        $("#password").addClass("input-field-ok");
        $("#password-repeat").addClass("input-field-ok");
    }
    else {
        $("#password").removeClass("input-field-ok");
        $("#password-repeat").removeClass("input-field-ok");
        $('#pass-match').show();
        $('#pass-match').text("Le due password non coincidono");
        //$('#pass-match').css({"border-color":"#FF0000","background-color":"#F75D59"});
        $('#pass-match').addClass("input-message-error");
    }
}



$(document).on('blur', "#username", function() { validaUsername()}); 

function validaUsername(){
	//VALIDO USERNAME
	//var pattern = new RegExp("^[a-z0-9]{3,12}$");
	var stringa = $("#username").val();
	//checkUsernameOnDatabase($("#username").val());
	if(stringa === ''){
            //$("#username-err").removeAttr("hidden");
            $('#username-err').show();
            $("#username-err").text("Inserisci un username");
            $("#username").removeClass("input-field-ok");
            $('#username-err').addClass("input-message-error");
            //$('#username-err').switchClass("input-field-ok","input-message-error");
            
	} 
        else{
		checkUsernameOnDatabase($("#username").val());
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
                        //var message="username disponibile";
                        //$('#checkUser').css({"border-color":"#00FF00","background-color":"#BCE954"});
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

$(document).ready(function(){
    $('#reset').click(function(){
        $('*').removeClass("input-field-ok"); //rimuove i bordi verdi da tutti i campi
        $('.no-input,#pass-strength,#pass-match').hide(); //nasconde tutti i messaggi di info/errore sotto ai campi
//        $('#checkUser').hide();
//        $('#pass-strength').hide();
//        $('#pass-match').hide();
    });
});

$(document).on('blur',"#nameReg",function(){validaNome()});

function validaNome(){
    var nome=$('#nameReg').val();
    if (nome===""){
        var message="Inserisci il tuo nome";
        $("#nameReg").removeClass("input-field-ok");
        $('#name-err').addClass("input-message-error");
        $('#name-err').text(message);
        $('#name-err').show();
    }
    else if(nome.match(/[^A-Za-z\s\']/)){
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

$(document).on('blur',"#surnameReg",function(){validaCognome()});

function validaCognome(){
    var cognome=$('#surnameReg').val();
    if (cognome===""){
        var message="Inserisci il tuo cognome";
        $("#surnameReg").removeClass("input-field-ok");
        $('#surname-err').addClass("input-message-error");
        $('#surname-err').text(message);
        $('#surname-err').show();
    }
    else if(cognome.match(/[^A-Za-z\s\']/)){
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

$(document).on('blur',"#cfReg",function(){validaCF()});

function validaCF(){
    var cf=$('#cfReg').val();
    if (cf===""){
        var message="Inserisci il tuo codice fiscale";
        $("#surnameReg").removeClass("input-field-ok");
        $('#cf-err').addClass("input-message-error");
        $('#cf-err').text(message);
        $('#cf-err').show();
    }
    else if(cf.match(/[^A-Z0-9]/)){
        var message="Il codice fiscale puo' contenere solo lettere maiuscole e numeri";
        $("#cf").removeClass("input-field-ok");
        $('#cf-err').addClass("input-message-error");
        $('#cf-err').text(message);
        $('#cf-err').show();
    }
    else if(cf.length!==16){
        var message="Il codice fiscale deve essere di 16 cifre";
        $("#cf").removeClass("input-field-ok");
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
        //$('#email').addClass("input-field-ok");
        //$('#email-err').hide();
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
                        //var message="email disponibile";
                        //$('#email-err').css({"border-color":"#00FF00","background-color":"#BCE954"});
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

$(document).on('blur',':text,:password',function(){activateButton()}); //attivata ogni volta che si lascia un input type text o password

function activateButton(){
    completed=isFormCompleted();
    if (completed===true) {
        $('#registration-button').removeAttr("disabled");
        $('#registration-button').removeClass("disabled");        
    }
}

function isFormCompleted(){
	var completed = false;

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


