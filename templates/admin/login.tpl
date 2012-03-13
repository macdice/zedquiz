<html>
  <body>
    <form action="login_do.php" method="POST">
      <h1>Login</h1>
      <fieldset class="textInputs">
	<legend>Login Details</legend>
	<ul>
	  <li>
	    <label for="username">Username:</label> <input type="text" name="username" id="username" title="Your username">
	  </li>
	  <li>
	    <label for="password">Password:</label> <input type="text" name="password" id="password" title="Your password">
	  </li>
	</ul>
	</fieldset>
      </fieldset>
      <fieldset class="buttons">
	<legend>Buttons</legend>
	<label><input type="submit" value="Login"></label>
      </fieldset>
{if $mode == "retry"}
<p>Authentication failure.  Please retry.</p>
{/if}
{if $mode == "toomanyfailures"}
<p>Too many failures.  Goodbye.</p>
{/if}
    </form>
  </body>
</html>
