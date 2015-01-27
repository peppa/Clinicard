<div class="title">
    <p>Tutte le visite del paziente {$name} {$surname}:</p>
</div>
    
<div id="allChecks">
    <table>
        {foreach $PatChecks as $visit} <!-- visit è un array che contiene soltanto la data della visita -->
            <tr>
                <td>
                    {$visit}
                </td>
                <td>
                    <a href="index.php?control=manageDB&action=getFullData&p={$pat}&ch={md5($visit)}"><button class="a_demo_four">vai</button></a>
                </td>
            </tr>
        {/foreach}
    </table>
</div>

<div class="spacing"></div>

<form method="POST" action="index.php?control=manageDB&action=newVisit&p={$pat}" class="button-form">
    <button type="submit" class="button">Aggiungi visita</button>
</form>
    
<div class="spacing"></div>