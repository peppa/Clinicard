<div>
  <form class="log" method="POST" action="index.php?control=login">

    <div>
      <input class="input-field" type="text" name="username" placeholder="username">
      <input class="input-field" type="password" name="password" placeholder="password">
      <input id="login" type="submit" value="Login">
    </div>

    <div>
      <input type="checkbox" name="keepLogged" value="yes"> Ricordami
    </div>

  </form>
</div>

<div>
  <form method="POST" action="index.php?control=recoverPass">
    <a href=""> Password dimenticata ? </a>
  </form>
</div>