<!DOCTYPE HTML>
<html>
	<head>
		<title>Scheda paziente</title>
	</head>

	<body>
            
		<br>
		Scheda del paziente {$info.name} {$info.surname}
		<br>
                Data della visita: {$info.dateCheck}
		<br>
                <br>
                <br>

		<form method="POST">

			<div>

		Nome: {$info.name}
		<br>
		Cognome: {$info.surname}
		<br>
		Sesso: {$info.gender}
		<br>
		DataNascita: {$info.dateBirth}
		<br>
		Codice Fiscale: {$info.CF}
		<br>
		Data Visita: {$info.dateCheck}
		<br>
		Anamnesi: {$info.medHistory}
		<br>
		Esame Obiettivo: {$info.medExam}
		<br>
		Conclusione: {$info.conclusions}
		<br>
		Prescrizione Esami: {$info.toDoExams}
		<br>
		Terapia: {$info.terapy}
		<br>
		Controllo: {$info.checkup}

	</div>

	<br>
	<br>


		<button type="submit" formaction="index.php?control=manageDB&action=modCheck&p={md5($info.CF)}&ch={md5($info.dateCheck)}">modifica</button>
		<button type="submit" formaction="index.php?control=manageDB&action=printReport&pat={md5($info.CF)}&ch={md5($info.dateCheck)}">stampa report</button>
		<button type="submit" formaction="index.php?control=manageDB&action=delCheck&p={md5($info.CF)}&ch={md5($info.dateCheck)}">cancella</button>
	</form>
