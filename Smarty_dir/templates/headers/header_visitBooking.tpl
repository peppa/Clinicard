<!-- calendar's css -->
<link rel='stylesheet' href='lib/js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' href='lib/js/jquery-ui/jquery-ui.theme.css' />

<!-- used lib -->
<script type='text/javascript' src='lib/js/jquery-2.1.3'></script>
<script type='text/javascript' src='lib/js/jquery-ui/jquery-ui.js'></script>
<script type='text/javascript' src='lib/js/fullcalendar/lib/moment.min.js'></script>
<script type='text/javascript' src='lib/js/fullcalendar/fullcalendar.js'></script>
<script type='text/javascript' src='lib/js/fullcalendar/lang/it.js'></script>
<script type='text/javascript' src='lib/js/bPopup.js'></script>

<!-- personal scripts -->
{if $isMedic}
    <script type='text/javascript' src="lib/js/script/calendario_medico.js"></script>
{else}
    <script type='text/javascript' src="lib/js/script/calendario_utente.js"></script>
{/if}



 <!-- needs to be -->

<!-- Google Calendar dependencies.. 
<script type='text/javascript' src='lib/js/fullcalendar/gcal.js'></script>

-->