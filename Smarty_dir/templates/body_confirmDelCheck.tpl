<div class="title">
    <img src="images/warning.png">
    <p>Confermi di voler cancellare la visita selezionata ?</p>
    <p>Non sar&aacute possibile recuperare i dati in futuro</p>
</div>

<div class="spacing"></div>

<form method="POST" class="button-form">
    <button class="button" type="submit" formaction="index.php?control=manageDB&action=delCheck&conf=yes&p={$cf}&ch={$ch}">conferma</button>
    <button class="button" type="submit" formaction="index.php?control=manageDB">annulla</button>
</form>
    
<div class="spacing"></div>