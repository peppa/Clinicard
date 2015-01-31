$(document).ready(function(){
    //aggiungere controllo in modo che le istruzioni successive vengano eseguite solamente quando 
    //viene aperta la pagina per modificare i dati di un paziente
    
    urlString=window.location.href; //prende l'url della pagina corrente
    splitUrlArray = urlString.split('='); //divide l'url in base al carattere specificato
    var EncCF=splitUrlArray[3]; //prende l'ultimo elemento dell'array (md5 del codice fiscale)
    //alert(EncCF);
    $.ajax({
        url: "index.php?control=manageDB&action=Fill&pat="+EncCF,
        type: "POST",
        success:  function(values){
            $('#name-pat').val(values["Name"]);
//            $('#surname-pat').val("Carducci");
//            $('#male').prop('checked',true);
//            $('#dateB-pat').val("1992-06-24");
//            $('#cf-pat').val("CRDGLI92H24A345S");
        }
    });
    
    
    
//        $('#name-pat').val(EncCF);
//        $('#surname-pat').val("Carducci");
//        $('#male').prop('checked',true);
//        $('#dateB-pat').val("1992-06-24");
//        $('#cf-pat').val("CRDGLI92H24A345S");
});

$(document).ready(function(){
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
        

$(document).ready(function(){
    urlString=window.location.href; //prende l'url della pagina corrente
    splitUrlArray = urlString.split('='); //divide l'url in base al carattere specificato
    var EncCF=splitUrlArray[3]; //prende l'ultimo elemento dell'array (md5 del codice fiscale)
    
    $.ajax({
        type: "POST",
        url: "index.php?control=ajax-prova",
        dataType: "json",
        data: {"cf":EncCF},
        success: function(array){
            $('#name').val(array["name"]);
            $('#surname').val(array["surname"]);
            $('#dateB').val(array["dateB"]);
            $('#CF').val(array["CF"]);
            if (array["gender"]=="M"){
                 $(':radio[value="M"]').attr('checked', 'checked');
            }
            else {
                $(':radio[value="F"]').attr('checked', 'checked');
            }
        }
    });
});


