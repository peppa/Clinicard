
		<br>
		Scegli i campi da stampare
		<br>
	    <br>

	    <form method="POST" action="index.php?control=manageDB&action=printReport&fields=sent&pat={$patLink}&ch={$checkLink}" target="_blank">
	    	<!-- Nome e Cognome, CF e Data di nascita vengono mostrati sempre -->

	    	<input type="checkbox" name="allFields" id="select-all"/>Tutti
	    	<br>
	    	<input type="checkbox" name="dateCheck" class="checkbox-field"/> Data visita
	    	<br>
	    	<input type="checkbox" name="medHistory" class="checkbox-field"/> Anamnesi
	    	<br>
	    	<input type="checkbox" name="medExam" class="checkbox-field"/> Esame obiettivo
	    	<br>
	    	<input type="checkbox" name="conclusions" class="checkbox-field"/> conclusioni
	    	<br>
	    	<input type="checkbox" name="toDoExams" class="checkbox-field"/> prescrizione esami
	    	<br>
	    	<input type="checkbox" name="terapy" class="checkbox-field"/> terapia
	    	<br>
	    	<input type="checkbox" name="checkup" class="checkbox-field"/> controllo
	    	<br>

	    	<input type="submit" value="stampa">
	    </form>