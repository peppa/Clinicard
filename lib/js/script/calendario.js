/* 
 * File creato da Carlo Centofanti
 */

//wait till DOM has been created, then call mainFunction()
$(mainFunction);

function mainFunction(){
    createCalendar();
}

function createCalendar(){
    $('#calendar').fullCalendar(calendarConfig);
}


function addLocalEvent(event){
    $('#calendar').fullCalendar( 'renderEvent', event, true);
}

//fai form pe inseri i dati della visita
function modifyEvent(event){
    
}

//build an error div and place it before the calendar
function showErrorMessage(error){
    var errorDiv=$('<div>',{
        id:"errormsg",
        title: "ATTENZIONE!",
        text: error
    });
    //errorDiv.addClass("errormsg");
    $("#calendar").prepend(errorDiv);  
    $("#errormsg").errorStyle();
}

function showSuccessMessage(message){
    var successDiv=$('<div>',{
        id:"successmsg",
        title: "OK!",
        text: message
    });
    $("#calendar").prepend(successDiv);  
    $("#errormsg").errorStyle();
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

//register a new jquery-ui policy function
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
   
    //some configuration first
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
    unselectAuto: false,
    unselectCancel:'html-id',// an id wich do not auto cancel (use if unselectAuto is true)
    selectHelper: true, //draw a "placeholder" event while the user is dragging
    selectOverlap:true,//verificare se funziona quando creo eventi. dovrebbe impedi di selezionare sopra gli eventi
    selectConstraint:{
        start: '08:00:00', //start da do clicchi
        end: '19:00:00'     //end a do clicchi +1... come se fa??
    },
    eventClick: function( event, jsEvent, view ){
        var currentTimestamp = new Date().getTime();
        $(".errormsg").remove();
        
        //validate the event
        
        if(event.start > todayTimestamp()){
            if(event.start > tomorrowTimestamp()){
                alert ("ok");
                addLocalEvent(event);
                modifyEvent(event);//non fa niente per ora, va scritta la funzione
                saveEvent(event);
                //checkEventAvaiability(event.start.format());
                
            }else{//sta tentando di prenotarsi per oggi
                showErrorMessage("Non puoi prenotarti per oggi stesso! Per favore scegli un altra data");
                
            }   
         
        }else{//sta tentando di prenotarsi per un giorno passato
            showErrorMessage("Non puoi prenotarti per un giorno passato! Per favore scegli un altra data");
           
        }
        
    }
});

function saveEvent(event){
    cf="ahsjch23hjeisd24";
    dataInizio:"da inserire";
    eventID:"1";
    eventObject: event;
    titolo:"Titolo";
    
    $.ajax({
        type: "POST",
        url:"index.php?control=ajaxCall&task=saveEvent",
        dataType:"json",
        data:{
            "CF": cf,
            "dataInizio":dataInizio,
            "EventID":eventID,
            "eventObject":eventObject,
            "Titolo":titolo
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

        
     