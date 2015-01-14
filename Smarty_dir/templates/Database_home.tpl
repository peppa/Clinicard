<!DOCTYPE HTML>
<html>
	<head>
		<title>Database Pazienti</title>
	</head>

	<body>
		PAGINA DI GESTIONE DEL DATABASE PAZIENTI

		<form method="POST" action="index.php?controllerAction=manageDB&action=insert">
			<div>
				<input type="submit" value="inserisci">
			</div>
		</form>

		<form method="POST" action="index.php?controllerAction=manageDB&action=search">
			<div>
				<input type="submit" value="cerca">
			</div>
		</form>



		<!-- show all patients in DB -->

		<br>
		<br>
		<br>
		Tutti i pazienti nel DB (Nome, Cognome, CF)
		<br>
		<br>

		<ul>
		{foreach $rows as $patient}
	    <li> {$patient.name} {$patient.surname} {$patient.cf}
	    <a href="{$part1}{$patient.link}">vai </a>
	    </li>
	    <br>
	    {/foreach}
	    </ul>

	</body>
</html>