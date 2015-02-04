
		<div class="title">
                    <p>Scegli i campi da stampare</p>
		</div>

<div class="spacing"></div>

<form class="center" method="POST" action="index.php?control=manageDB&action=printReport&fields=sent&pat={$patLink}&ch={$checkLink}" target="_blank">
    <!-- Nome e Cognome, CF e Data di nascita vengono mostrati sempre -->
    <div class="DBTable" id="report-fields">
    <table>
        <tr>
            <td>
                <input type="checkbox" name="allFields" id="select-all"/>
            </td>
            <td>
                Tutti
            </td>
        </tr>
        
        <tr>
            <td class="checkbox">
                <input type="checkbox" name="dateCheck" class="checkbox-field"/>
            </td>
            <td>
                Data della visita
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="medHistory" class="checkbox-field"/>
            </td>
            <td>
                Anamnesi
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="medExam" class="checkbox-field"/>
            </td>
            <td>
                Esame Obiettivo
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="conclusions" class="checkbox-field"/>
            </td>
            <td>
                Conclusioni
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="toDoExams" class="checkbox-field"/>
            </td>
            <td>
                Prescrizione esami
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="terapy" class="checkbox-field"/>
            </td>
            <td>
                Terapia
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="checkbox" name="checkup" class="checkbox-field"/>
            </td>
            <td>
                Controllo
            </td>
        </tr>
    </table>
    </div>
    <div class="spacing"></div>
    <button id="printReport" class="controlButton disabled" type="submit" disabled>Stampa</button>
</form>
    
<div class="spacing"></div>    

    