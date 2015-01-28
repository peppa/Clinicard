<div class="title">
    <p>Tutte le visite del paziente {$name} {$surname}:</p>
</div>
    
<!--<div class="CSSCSSTableGenerator">
    <table>
        <tbody>
            <tr>
                <td>Data della visita</td>
                <td></td>
            </tr>
        {foreach $PatChecks as $visit}
            <tr>
                <td>
                    {$visit}
                </td>
                <td>
                    <a href="index.php?control=manageDB&action=getFullData&p={$pat}&ch={md5($visit)}"><button class="a_demo_four">vai</button></a>
                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>-->
        
<div class="CSSTableGenerator" id="patient-checks">
<table>
    <tbody>
        <tr>
            <td>Data della visita</td>
            <td></td>
        </tr>
        {foreach $PatChecks as $visit}
            <tr>
                <td>{$visit}</td>
                <td><a href="index.php?control=manageDB&action=getFullData&p={$pat}&ch={md5($visit)}"><button class="a_demo_four">vai</button></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
</div>

<div class="spacing"></div>

<form method="POST" action="index.php?control=manageDB&action=newVisit&p={$pat}" class="button-form">
    <button type="submit" class="a_demo_three">Aggiungi visita</button>
</form>
    
<div class="spacing"></div>