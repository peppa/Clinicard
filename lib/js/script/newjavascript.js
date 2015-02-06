

// punta al task eventualmente dragged per la cancellazione
// settato da $("#droppable" ).droppable()
var draggedTask;

// funzione parametrica che gestisce tutte le chiamate ajax al server
function syncToServer( value, op ) {
	$.ajax({
		url: "php/drag-and-drop.php",
		data: { content: value, action: op },
		success:  function(jsonData) {
					$('li.ui-state-default').remove();
					var listItem;
					for ( var id in jsonData ) {
						listItem = '<li id="' + id + '">' + jsonData[id] + '</li>';
						$(listItem).addClass("ui-state-default").appendTo('#sortable');
					};
				},
		dataType: "json"
	});
}			

// codice da avviare al caricamento del DOM ...
$(function() {

	// Il click sull nav bar cambia dinamicamente il tema di jquery-ui tra alcuni presi dal sito
	$("#navigation li a").click(function() {
		$("#theme").attr("href",$(this).attr('rel'));
		return false;
	});

	// trasforma il submit in un widget di tipo "button"
    $( "input:submit").button();

	// crea nel DOM un div che rappresenta il dialog di conferma da mostrare a fronte di una
	// cancellazione di task - il dialog è settato a autoOpen=false
	var dialogConfirm = $('<div>')
		.attr('id','dialog-confirm')
		.attr('title','Delete task?')
		.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> \
		          These items will be permanently deleted and cannot be recovered. <br> Are you sure? \
               </p>')
		.dialog({
				autoOpen: false,
				modal: true,
				buttons: {
					"Delete": function() {

						var deletedId = draggedTask.attr("id");
						syncToServer( deletedId, "delTask");

						draggedTask.remove();
						$( this ).dialog( "close" );

						$( "#droppable" ).addClass( "ui-state-highlight" )
							.find( "p" )
							.html( "Deleted!" );
					},
					Cancel: function() {
						$( this ).dialog( "close" );
					}
				}
			})

	// caricamento della lista a tempo 0
	$.ajax({
		url: "php/initializeList.php",
		success:  function(jsonData) {

					$("#loading").hide();

					var listItem;
					for ( var id in jsonData ) {
						listItem = '<li id="' + id + '">' + jsonData[id] + '</li>';
						$(listItem).addClass("ui-state-default").appendTo('#sortable');
					}

				},
		dataType: "json"
	});

	// valida il campo di input e, se i dati sono corretti, invia dato al server e ricrea lista task
	// dipende dal plugin jquery.validate.min.js - vedi http://docs.jquery.com/Plugins/Validation
	$("#formNewTask").validate({
		rules: {
			newTask: {
				required: true,
				minlength: 3
			}
		},
		messages: {
			newTask: {
				required: "Please, enter a task!",
				minlength: "At least 3 chars, please!",
				maxlength: "At most 20 chars, please!"
			}
		},
		submitHandler: function() {

			var value = $("#newTask").val();
			syncToServer( value, "addNewTask");
			$("#newTask").val("");
		}							   
	});

	// permette il sort dei task nella lista e invia la lista riordinata al server
	$( "#sortable" ).sortable(
	    {
			cursor: 'crosshair',
			update: function(event, ui) {

				// ------------- start list id serialization
				var serialized = [];
				$("#sortable li").each(
					function() {
						var id = $(this).attr("id");
						serialized.push(id);
					}
				);
				// ------------- end list id serialization				
				
				syncToServer( serialized, "updateList");
			}				  
		}
	);

	// .disableSelection() is a core utility. It's useful for making text elements, or elements that contain
	// text, not text-selectable. For example, if you have a draggable element, you may not want text selection
	// to occur when the user goes to drag the element.
	$( "#sortable" ).disableSelection();

	// permette la cancellazione di task - invia l'id del task cancellato al server per la relativa
	// query al db
	$( "#droppable" ).droppable({
		tolerance: "pointer",
		drop: function( event, ui ) {

			draggedTask = ui.draggable;
			dialogConfirm.dialog('open');
		}
	});


}); // fine jqdialogConfirmuery "document ready function" 
