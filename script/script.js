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
    totStrength=0;
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

//$(document).ready(function(){
//    if ( window.location.href.match(/Registration/)){
//       // $("#username").on("keyup change", function() {
//            username=$("#username").value;
//            
//            $.ajax({
//                type: "POST",
//                url: "index.php?control=ajaxCall&task=checkUsername",
//                dataType: "json",
//                data: {"user":username},
//                success: function(result){
//                    if ( result===false){
//                        var message="username disponibile";
//                        $('#checkUser').css({"border-color":"#FF0000","background-color":"#F75D59"});
//                    }
//                    else {
//                        var message="username non disponibile";
//                        $('#checkUser').css({"border-color":"#00FF00","background-color":"#BCE954"});
//                    }
//                    $('#checkUser').removeAttr('hidden');
//                    $('#checkUser').text(result);
//                }
//            });
//       // });
//    }
//});

$(document).on('blur', "#username", function() { validaUsername()});

function validaUsername(){
	//VALIDO USERNAME
	//var pattern = new RegExp("^[a-z0-9]{3,12}$");
	var stringa = $("#username").val();
	//checkUsernameOnDatabase($("#username").val());
	if(stringa === ''){
	$("#checkUser").removeAttr("hidden");
		$("#checkUser").text("Inserisci un username");
		$('#checkUser').css({"border-color":"#F88017","background-color":"#FF7F50"});
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
//		success:  function(result) {
//			//username_val = data["responseJSON"];
//			//window.username_database=username_val.username_database;
//			if (result===true) {
//                            $('#name').val(result);
//				$("#checkUser").removeAttr("hidden");
//				$("#checkUser").text("L'username inserito e' gia'  associato ad un altro account");
//				$('#checkUser').css({"border-color":"#00FF00","background-color":"#BCE954"});
//			} else if (result===false){
//                            $('#name').val(result);
//				$("#checkUser").removeAttr("hidden");
//                                $("#checkUser").text("L'username e' disponibile");
//				$('#checkUser').css({"border-color":"#00FF00","background-color":"#BCE954"});
//			};
//			}
complete: function(result){
                    JSON.stringify(result);
                    if ( result.responseText==="false"){
                        var message="username disponibile";
                        $('#checkUser').css({"border-color":"#00FF00","background-color":"#BCE954"});
                    }
                    else if ( result.responseText==="true") {
                        var message="username non disponibile";
                        $('#checkUser').css({"border-color":"#FF0000","background-color":"#F75D59"});
                    }
                    $('#checkUser').removeAttr('hidden');
                    $('#checkUser').text(message);
                }
	});
}

