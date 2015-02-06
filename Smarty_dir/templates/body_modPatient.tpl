<div class="title">
    <p>MODIFICA I DATI DEL PAZIENTE</p>
</div>

<div class="spacing"></div>

<!--<form clas method="POST" class="mod-pat" action="index.php?control=manageDB&action=modPat&mod=completed&p={$link}">
    <table>
        
        <tr>
            <td class="field-label"> Nome: </td>
            <td> <input class="input-field" type="text" name="name" id="name-pat"/> </td>
        </tr>
        
        <tr>
            <td class="field-label"> Cognome: </td>
            <td> <input class="input-field" type="text" name="surname" id="surname-pat"/> </td>
        </tr>
        
        <tr>
            <td class="field-label">Sesso: </td>
            <td>
                <input type="radio" name="gender" id="male" value="M"> M 
                <input type="radio" name="gender" id="female" value="F"> F 
            </td>
        </tr>
        
        <tr>
            <td class="field-label">Data di nascita:</td>
            <td> <input class="input-field" type="date" name="dateBirth" id="dateB-pat" /> </td>
        </tr>
        
        <tr>
            <td class="field-label"> Codice Fiscale: </td>
            <td> <input class="input-field" type="text" name="CF" id="cf-pat"/> </td>
        </tr>
        
        <tr>
            <td></td>
        </tr>
        
        <tr>
            <td> <button class="button" type="submit"/>invia dati</button> </td>
            <td> <button class="button" type="reset"/>reset</button> </td>
        </tr>
        
    </table>
</form>-->

<form id="modPatient" method="POST">
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Nome</label></p>
            <p><input class="input-field" type="text" name="name" id="modName"/></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Cognome</label></p>
            <p><input class="input-field" type="text" name="surname" id="modSurname"/></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Sesso</label></p>
            <p>
                <input type="radio" name="gender" value="M"> M
                <input type="radio" name="gender" value="F"> F
            </p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Data di nascita</label></p>
            <p><input class="input-field" type="date" name="dateBirth" id="modDateB"/></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Codice Fiscale</label></p>
            <p><input class="input-field" type="text" name="CF" id="modCF"/></p>
        </div>
    </div>
    
    <div class="row-buttons">
        <p> <button class="controlButton" type="submit" formaction="index.php?control=manageDB&action=modPat&mod=completed&p={$link}"/>invia dati</button>
            <button class="controlButton" type="reset"/>reset</button> 
            <button class="controlButton" type="submit" formaction="index.php?control=manageDB"/>annulla</button> 
        </p>
    </div>
</form>
    
<div class="spacing"></div>