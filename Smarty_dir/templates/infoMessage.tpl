<div class="center"> <!-- per adesso è uguale a errorMessage.tpl, vanno messi gli identificatori dentro al div -->
    <div class="infomsg">
        <p>{$message}</p>
    </div>
    {if $addButton eq true}
        <a href="index.php?control=manageDB"><button class="controlButton">torna alla Home</button></a>
    {/if}
</div>

<div class="spacing"></div>