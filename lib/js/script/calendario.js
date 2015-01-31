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


function addTemporaryEvent(event){
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
    $("#calendar").prepend(errorDiv);
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
        var StyledError = "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;\">";
            StyledError += "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\">";
            StyledError += "</span><strong>ATTENZIONE: </strong>";
            StyledError += oldErrore ;
            StyledError += "</p></div>";
            this.replaceWith(StyledError );
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
        
        //validate the event
        
        if(event.start > todayTimestamp()){
            if(event.start > tomorrowTimestamp()){
                alert ("ok");
                addTemporaryEvent(event);
                modifyEvent(event);//non fa niente per ora, va scritta la funzione
                //checkEventAvaiability(event.start.format());
                
            }else{//sta tentando di prenotarsi per oggi
                showErrorMessage("Non puoi prenotarti per oggi stesso!");
                
            }   
         
        }else{//sta tentando di prenotarsi per un giorno passato
            showErrorMessage("Non puoi prenotarti per ieri!");
           
        }
        
    }
});

        
     