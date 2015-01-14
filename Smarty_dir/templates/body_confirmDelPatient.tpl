<br>
Confermi di voler cancellare il paziente selezionato ?
<br>
Verrano eliminate anche tutte le sue visite
<br>
Non sar&aacute possibile recuperare i dati in futuro
<br>
<br>
<br>

<form method="POST">
    <button type="submit" formaction="index.php?control=manageDB&action=delPat&conf=yes&p={$cf}">conferma</button>
    <button type="submit" formaction="index.php?control=manageDB">annulla</button>
</form>