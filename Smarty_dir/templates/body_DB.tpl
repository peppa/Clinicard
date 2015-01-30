<div class="title" id="home-title">
    <p>PAGINA DI GESTIONE DEL DATABASE PAZIENTI</p>
</div>

<form method="POST" action="index.php?control=manageDB&action=insert" class="button-form">
    <div>
        <button type="submit" class="a_demo_three" id="insert-pat">inserisci</button>
    </div>
</form>

<form method="POST" action="index.php?control=manageDB&action=search" class="button-form">
    <div>
        <button type="submit" class="a_demo_three"id="search-pat">cerca</button>
    </div>
</form>

<!-- show all patients in DB -->
<div class="title">
    <p>TUTTI I PAZIENTI NELL'ARCHIVIO</p>
</div>

<div class="CSSTableGenerator">
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
                <td><a href="index.php?control=manageDB&action=getChecks&p={$patient.link}"><button class="a_demo_four">vai</button> </a></td>
                <td><a href="index.php?control=manageDB&action=modPat&p={$patient.link}"><button class="a_demo_four">modifica</button></a></td>
                <td><a href="index.php?control=manageDB&action=delPat&p={$patient.link}"><button class="a_demo_four">elimina</button></a></td>
            </tr>
        {/foreach}
    </tbody>
</table>
</div>
    
<div class="spacing"></div>


