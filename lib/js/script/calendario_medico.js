/* 
 * File creato da Carlo Centofanti
 */

//wait till DOM has been created, then call mainFunction()
//var events;
$(mainFunction);

function mainFunction(){
    $.ajaxSetup({ cache: false });
    createCalendar();
   // dialogForm();
}

function createCalendar(){
    $("#popup-form").hide();
    var calendario=$('#calendar').fullCalendar(calendarConfig);
   

}

function saveEvent(event){
    
    //vanno tolti e messi tutti ai valori di event come datainizio e datafine
    dataInizio=event.start.format();
    dataFine=event.end.format();
    eventID=new Date().getTime()-parseInt(Math.random()*100); 
    titolo="Prenotazione";
    eventObject=JSON.stringify(event);
    
    
    
    $.ajax({
        type: "POST",
        url:"index.php?control=ajaxCall&task=saveEvent",
        dataType:"html",
        data:{
            "dataInizio": dataInizio,
            "eventID": eventID,
            "eventObject": eventObject,
            "titolo": titolo,
            "dataFine": dataFine
        },
        success:function (fail){
            
            if(!fail){
                showSuccessMessage("Visita aggiunta correttamente");
            }else{
                showErrorMessage(fail);
            }
        }
        
        
    });   
}

function deleteEvent(event){    
    
    $.ajax({
        type: "POST",
        url:"index.php?control=ajaxCall&task=deleteEvent",
        dataType:"json",
        data:{
            "SerialNumber": event.SerialNumber
        },
        success:function (fail){
            
            if(!fail){
                showSuccessMessage("Visita rimossa correttamente");
            }else{
                showErrorMessage("Non è stato possibile rimuovere l'evento. ERROR: "+fail);
            }
        }
        
        
    });   
}

//build an error div and place it before the calendar
function showErrorMessage(error){
    $(".errormsg").remove();
    $(".infomsg").remove();
    var errorDiv=$('<div>',{
        id:"errormsg",
        title: "ATTENZIONE!",
        text: error
    });
    //errorDiv.addClass("errormsg");
    $("#calendar").prepend(errorDiv);  
    $("#errormsg").errorStyle();
    $('.errormsg').bPopup();
}

function showSuccessMessage(message){
    $(".errormsg").remove();
    $(".infomsg").remove();
    var successDiv=$('<div>',{
        id:"successmsg",
        title: "OK!",
        text: message
    });
    $("#calendar").prepend(successDiv);  
    $("#successmsg").successStyle();
    $('.infomsg').bPopup();
}


//returns tomorrow's timestamp
function tomorrowTimestamp(){
    var today = new Date();
    var d = today.getDate();
    var m = today.getMonth();
    var y = today.getFullYear();

    var tomorrow= new Date(y, m, d+1);
    return tomorrow.getTime();
}

function todayTimestamp(){
    var today = new Date();
    var d = today.getDate();
    var m = today.getMonth();
    var y = today.getFullYear();

    var yesterday= new Date(y, m, d);
    return yesterday.getTime();
}

//register some jquery functions
//adds an error style. call like: $(...).errorStyle();
(function($) {
    $.fn.errorStyle = function() {
        var oldErrore = this.html();
        var StyledError = "<div class=\"ui-state-error ui-corner-all errormsg\" style=\"padding: 0 .7em;\">";
            StyledError += "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\">";
            StyledError += "</span><strong>ATTENZIONE: </strong>";
            StyledError += oldErrore ;
            StyledError += "</p></div>";
            this.replaceWith(StyledError );
    };
})(jQuery);

//adds a success style
(function($) {
    $.fn.successStyle = function() {
        var oldSuccess = this.html();
        var StyledSuccess = "<div class=\"ui-state-highlight ui-corner-all infomsg\" style=\"padding: 0 .7em;\">";
            StyledSuccess += "<p><span class=\"ui-icon ui-icon-check\" style=\"float: left; margin-right: .3em;\">";
            StyledSuccess += "</span><strong>OK: </strong>";
            StyledSuccess += oldSuccess ;
            StyledSuccess += "</p></div>";
            this.replaceWith(StyledSuccess );
    };
})(jQuery);

var calendarConfig=({
    events: 'index.php?control=ajaxCall&task=getMyEvents',
   
    
   
    //some configuration first
    editable:true,
    defaultView: 'agendaWeek',
    handleWindowResize: true,
    allDaySlot: false, // do not visualize the all day cell
    slotDuration: '00:30:00', //visualize 30 minutes per cell
    hiddenDays: [0,6] , //do not show sat and sun
    
        
    //use custom theme
    theme: true, 
    themeButtonIcons: true,
        
    //time shown on the vertical index
    minTime: '08:00:00',
    maxTime: '21:30:00',
    
    slotEventOverlap: true, //http://fullcalendar.io/docs/agenda/slotEventOverlap/
    header: {
            center:'title',
            left: 'agendaWeek,agendaDay',
            right:'today prev,next'
        },
    
    //selection settings
    selectable: true,
    unselectAuto: true,
    unselectCancel:'html-id',// an id wich do not auto cancel (use if unselectAuto is true)
    selectHelper: true, //draw a "placeholder" event while the user is dragging
    selectOverlap:true,//verificare se funziona quando creo eventi. dovrebbe impedi di selezionare sopra gli eventi
    selectConstraint:{
        start: '08:00:00', 
        end: '20:00:00'     
    },
    select: function( start, end, jsEvent, view ) {
        event= {
            start: start,
            end: end
        };
        
        var currentTimestamp = new Date().getTime();
        
        
        //validate the event
        
        if(event.start > todayTimestamp()){
            if(event.start > tomorrowTimestamp()){
              
                dialogForm(event);
               
                
            }else{//sta tentando di prenotarsi per oggi
                showErrorMessage("Non puoi prenotarti per oggi stesso! Per favore scegli un altra data");
                
            }   
         
        }else{//sta tentando di prenotarsi per un giorno passato
            showErrorMessage("Non puoi prenotarti per un giorno passato! Per favore scegli un altra data");
           
        }
        
    }    
});


//------------------------------------------------------------------

//da togliere da qua.. fare altro js

//-----------
//callback per il form
//$("#Visit-Form").submit(function(e){
    
//});

Date.parseDate = function( input, format ){
  return moment(input,format).toDate();
};
Date.prototype.dateFormat = function( format ){
  return moment(this).format(format);
};


function dialogForm(event){
    var form=$("#Visit-Form").submit(function (e){
       e.preventDefault(); 
       form.dialog( "close" );
       saveEvent(event);
       $('#calendar').fullCalendar( 'refetchEvents' );
       
    });
    $("#calendar").zIndex(0);
    form.dialog({
        resizable:false,
        autoOpen: true,

        showType:true,
        modal: true,
        draggable: true,
        
        beforeClose:function(e,ui){
            $("#calendar").fullCalendar( 'unselect' );
        }
        
    });
    autoCompileForm(event);
   
}
              
                  
                                                                
//autocompile the visit form
function autoCompileForm(event){
    $.ajax({
       url:"index.php?control=ajaxCall&task=getUserData",
       dataType:"json",
       success:function(info){
           $("#name").val(info.Nome);
           $("#surname").val(info.Cognome);
           $("#cfReg").val(info['Codice Fiscale']);
           $("#email").val(info.Email);
           $("#name").val(info.Nome);
           $data=$("#dataVisita").val(event.start.format());
           jQuery("#dataVisita").datetimepicker({
                format:'YYYY-MM-DDTh:mm:ss',
                formatTime:'h:mm a',
                formatDate:'DD.MM.YYYY',
                step: 30
                
              });
           //$("#Visit-Form").show();
           
       }
       
    });
}


     