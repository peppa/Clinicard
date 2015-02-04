<div class="title warning">
    <p>Confermi di voler cancellare la visita selezionata ?</p>
    <p>Non sar&aacute possibile recuperare i dati in futuro</p>
</div>
<div id="last-check" hidden>
    <p>Cancellando l'ultima visita verr&agrave cancellato dall'archivio</p>
    <p>anche il paziente stesso</p>
</div>

<div class="spacing"></div>

<form method="POST" class="center">
    <button class="controlButton" type="submit" formaction="index.php?control=manageDB&action=delCheck&conf=yes&p={$cf}&ch={$ch}">conferma</button>
    <button class="controlButton" type="submit" formaction="index.php?control=manageDB&action=getFullData&p={$cf}&ch={$ch}">annulla</button>
</form>
    
<div class="spacing"></div>