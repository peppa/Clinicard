<!DOCTYPE HTML>
<html>
	<head>
		<title>Risultati</title>
	</head>

	<body>
            <br>
            {$message}
            <br>
            
	    <br>
	    <ul>
	    {if $numResults!=0}
	    {foreach $rows as $patient}
	    <li> {$patient.name} {$patient.surname} {$patient.cf}
	    <a href="{$part1}{$patient.link}">vai </a>
	    </li>
	    <br>
	    {/foreach}
	    </ul>
	    {/if}
	    
	</body>
</html>