 <!-- Header for Assignment2. -->
 
 <!-- validation for login form -->
<script type="text/javascript">
		
	function validLoginForm(text) {

		var username = text.username.value;
		var password = text.password.value;
				
		var errormsg = new Array();

		if (username.length == 0) {
			errormsg[0] = "Username";
		}
		if (password.length == 0) {
			errormsg[1] = "Password";
		}
		if (errormsg.length != 0) {
			alert("Input " + errormsg.join(" "));
			return false;
		} else {
		
		}
		return true;
	}
</script>
<header>
<hr>
	<span class="sname">Employment</span>
<hr>
	{if $error}
		<table><td colspan="2" class="alert">{$error}</td></table>
	{/if}
	{if $user}
		<table>
			<tr>
				<td><font color="white">Welcome {$firstname} {$lastname} ({$category})</font></td>
				<td>
					<form name="login" id="login" method="post" action="logout.php">
						<input type="submit" name="logout" value="Logout">
					</form>
				</td>
				<td>
					<form name="update" id="update" method="get" action="user_detail.php?id={$id}&changePW=change">
						<input type="hidden" name="id" value="{$id}">
						<input type="submit" name="changePW" value="Change PW">
					</form>
				</td>
				<td>
				{if $category == 'admin'}
					<form name="userlist" id="userlist" method="get" action="user_list.php">
						<input type="submit" name="admin" value="User list">
					</form>
				</td>
				<td>
					<form name="addmanager" id="addmanager" method="post" action="add_user.php">
						<input type="submit" name="admin" value="Add Manager">
					</form>
				{/if}
				</td>
			</tr>
		</table>
	{else}
		<table>
			<tr>
				<td><form name="login" id="login" method="post" action="login.php" onSubmit="return validLoginForm(this);">
						<label for="username">Username: </label>
						<input type="text" name="username">
						<label for="password">Password: </label> 
						<input type="password" name="password">
						<input type="submit" name="submit" value="Login">
					</form>
				</td>
				<td><form name="adduser" id="adduser" method="post" action="add_user.php">
						<input type="submit" name="submit" value="New Account">
					</form>
				</td>
			</tr>
		</table>
	{/if}		
<hr>
</header>