/* 
 * File creato da Carlo Centofanti
 */


    
    
$(document).ready(function() {
    $('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyAd1vx_92E0l2jbBPRk6u-P-Nz8S_Ks3lM',
        events: {
            googleCalendarId: 'carlo.clinicard@gmail.com',
            color: 'red',   
            textColor: 'black', 
            backgroundColor: 'green'
        }
    });
});

