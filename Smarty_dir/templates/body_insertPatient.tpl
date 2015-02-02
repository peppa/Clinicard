<div class="title">
    <p>INSERISCI I DATI DEL PAZIENTE</p>
</div>

<div class="spacing"></div>
<!--
<form class="button-form" method="POST" action="index.php?control=manageDB&action=insert&sent=y">
    <table>
        <tr>
            <td class="field-label"> Nome: </td>
            <td> <input class="input-field" type="text" name="name"/> </td>
        </tr>
        
        <tr>
            <td class="field-label"> Cognome: </td>
            <td> <input class="input-field" type="text" name="surname"/> </td>
        </tr>
        
        <tr>
            <td class="field-label">Sesso: </td>
            <td>
                <input type="radio" name="gender" value="M"> M
                <input type="radio" name="gender" value="F"> F
            </td>
        </tr>
        
        <tr>
            <td class="field-label">Data di nascita:</td>
            <td> <input class="input-field" type="date" name="dateBirth" /> </td>
        </tr>
        
        <tr>
            <td class="field-label"> Codice Fiscale: </td>
            <td> <input class="input-field" type="text" name="CF"/> </td>
        </tr>
        
        <tr>
            <td class="field-label">Data visita:</td>
            <td> <input class="input-field" type="date" name="dateCheck" /> </td>
        </tr>
        
        <tr>
            <td class="area-label"> Anamnesi: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="medHistory"></textarea>
        </tr>
        
        <tr>
            <td class="area-label"> Esame obiettivo: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="medExam"></textarea>
        </tr>
        
        <tr>
            <td class="area-label"> Conclusioni: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="conclusions"></textarea>
        </tr>
        
        <tr>
            <td class="area-label"> Prescrizione esami: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="toDoExams"></textarea>
        </tr>
        
        <tr>
            <td class="area-label"> Terapia: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="terapy"></textarea>
        </tr>
        
        <tr>
            <td class="area-label"> Controllo: </td>
            <td> <textarea class="input-area" rows="5" cols="60" name="checkup"></textarea>
        </tr>
        
        <tr>
            <td> <button class="button" type="submit"/>invia dati</button> </td>
            <td> <button class="button" type="reset"/>reset</button> </td>
        </tr>
        
    </table>
</form>-->

<form method="POST" action="index.php?control=manageDB&action=insert&sent=y">
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Nome</label></p>
            <p><input class="input-field" id="nameDB" type="text" name="name"/></p>
            <p id="name-err-DB" class="no-input" hidden>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Cognome</label></p>
            <p><input class="input-field" id="surnameDB" type="text" name="surname"/></p>
            <p id="surname-err-DB" class="no-input" hidden>
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
            <p><input id="dateBirthDB" class="input-field" type="date" name="dateBirth" /></p>
            <p id="dateB-err-DB" class="no-input" hidden><p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Codice Fiscale</label></p>
            <p><input class="input-field" id="cfDB" type="text" name="CF"/></p>
            <p id="cf-err-DB" class="no-input" hidden></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Data della visita</label></p>
            <p><input class="input-field" id="dateCheckDB" type="date" name="dateCheck" /></p>
            <p id="dateC-err-DB" class="no-input" hidden><p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Anamnesi</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="medHistory"></textarea></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Esame obiettivo</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="medExam"></textarea></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Conclusioni</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="conclusions"></textarea></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Prescrizione esami</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="toDoExams"></textarea></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Terapia</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="terapy"></textarea></p>
        </div>
    </div>
    
    <div class="row">
        <div class="row-element">
            <p class="label"><label>Controllo</label></p>
            <p><textarea class="input-area" rows="4" cols="40" name="checkup"></textarea></p>
        </div>
    </div>
    
    <div class="row-buttons">
        <p> <button id="insertNew" class="a_demo_three disabled" type="submit" disabled/>invia dati</button>
            <button class="a_demo_three" type="reset"/>reset</button>
        </p>
    </div>
</form>

<div class="spacing"></div>