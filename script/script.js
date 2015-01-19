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
        

$(document).ready(function(){ //riempire la form di modifica del paziente
    $('.modPat').click(function(){
        $('.modPat').data('patient',"stringaProva");
    });
    window.onload(function(){
        var stringa=$('.modPat').data('patient');
        alert('stringa');
    });
});

$(document).ready(function ($) {

    $('#myPassword').strength({
        strengthClass: 'strength',
        strengthMeterClass: 'strength_meter',
        strengthButtonClass: 'button_strength',
        strengthButtonText: 'Show password',
        strengthButtonTextToggle: 'Hide Password'
    });  

});


