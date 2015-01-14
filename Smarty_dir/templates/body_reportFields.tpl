
		<br>
		Scegli i campi da stampare
		<br>
	    <br>

	    <form method="POST" action="index.php?control=manageDB&action=printReport&fields=sent&pat={$patLink}&ch={$checkLink}">
	    	<!-- Nome e Cognome, CF e Data di nascita vengono mostrati sempre -->

	    	<input type="checkbox" name="allFields"/>Tutti
	    	<br>
	    	<input type="checkbox" name="dateCheck"/> Data visita
	    	<br>
	    	<input type="checkbox" name="medHistory"/> Anamnesi
	    	<br>
	    	<input type="checkbox" name="medExam"/> Esame obiettivo
	    	<br>
	    	<input type="checkbox" name="conclusions"/> conclusioni
	    	<br>
	    	<input type="checkbox" name="toDoExams"/> prescrizione esami
	    	<br>
	    	<input type="checkbox" name="terapy"/> terapia
	    	<br>
	    	<input type="checkbox" name="checkup"/> controllo
	    	<br>

	    	<input type="submit" value="stampa">
	    </form>