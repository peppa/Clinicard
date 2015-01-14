<div>
    <br>
    Tutte le visite del paziente {$name} {$surname}:
    <br>
    <br>
    
    <ul>
	    {foreach $PatChecks as $visit} <!-- visit è un array che contiene soltanto la data della visita -->
	    <li> {$visit}
                <button><a href="index.php?control=manageDB&action=getFullData&p={$pat}&ch={md5($visit)}">vai </a></button>
	    </li>
	    <br>
	    {/foreach}
            </ul>
            
            <form method="POST" action="index.php?control=manageDB&action=newVisit&p={$pat}">
                <button type="submit">Nuova</button>
            </form>
</div>