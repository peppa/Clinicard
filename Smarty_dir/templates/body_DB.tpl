<div class="title">
    <p>PAGINA DI GESTIONE DELL'ARCHIVIO DEI PAZIENTI</p>
</div>

<!--<form method="POST" action="index.php?control=manageDB&action=insert" class="center">-->
    <div class="center">
        <a href="index.php?control=manageDB&action=insert"><button type="submit" class="controlButton" id="insert-pat">inserisci</button></a>
    </div>
<!--</form>-->

<!--<form method="POST" action="index.php?control=manageDB&action=search" class="center">-->
    <div class="center">
        <a href="index.php?control=manageDB&action=search"><button type="submit" class="controlButton"id="search-pat">cerca</button></a>
    </div>
<!--</form>-->

<!-- show all patients in DB -->
<div class="title">
    <p>TUTTI I PAZIENTI NELL'ARCHIVIO</p>
</div>

<div class="DBTable">
<table>
    <tbody>
        <tr>
            <td>Nome</td>
            <td>Cognome</td>
            <td>Codice Fiscale</td>
            <td>Data di nascita</td>
            <td>Sesso</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        {foreach $people as $patient}
            <tr>
                <td>{$patient.name}</td> <td>{$patient.surname}</td> <td>{$patient.cf}</td> <td>{$patient.dateBirth}</td> <td>{$patient.gender}</td>
                <td><a href="index.php?control=manageDB&action=getChecks&p={$patient.link}"><button class="navButton">vai</button> </a></td>
                <td><a href="index.php?control=manageDB&action=modPat&p={$patient.link}"><button class="navButton">modifica</button></a></td>
                <td><a href="index.php?control=manageDB&action=delPat&p={$patient.link}"><button class="navButton">elimina</button></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
</div>
    
<div class="spacing"></div>


