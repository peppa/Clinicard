<div class="title">
    <p>Compila la form per registrarti</p>
</div>

<div class="spacing"></div>

<form class="button-form" method="POST" action="index.php?control=Registration&action=addUser">
    <table>
        <tr>
            <td><label class="field-label">Nome</label></td>
            <td><input class="input-field" type="text" name="name" placeholder="Nome"></td>
        </tr>

        <tr>
            <td><label class="field-label">Cognome</label></td>
            <td><input class="input-field" type="text" name="surname" placeholder="Cognome"></td>
        </tr>

        <tr>
            <td><label class="field-label">Codice Fiscale</label></td>
            <td><input class="input-field" type="text" name="CF" placeholder="Codice Fiscale"></td>
        </tr>


        <tr>
            <td><label class="field-label">Indirizzo Email</label></td>
            <td><input class="input-field" type="email" name="email" placeholder="Inserici email"></td>
        </tr>


        <tr>
            <td><label class="field-label">Username</label></td>
            <td><input class="input-field" type="text" name="username" placeholder="Username"></td>
        </tr>

        <tr>
            <td><label class="field-label">Password</label></td>
            <td><input class="input-field" type="password" name="password" placeholder="Password"></td>
        </tr>

        <tr>
            <td><button class="button" type="submit">Registrati</button></td>
        </tr>
        
    </table>
</form>

<div class="spacing"></div>