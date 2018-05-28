{extends file="base.tpl"}

{block name=title}User detail page{/block}

{block name=content}

<!-- validation for change password form -->		
<script type="text/javascript">

	function validChangePWForm(text) {

		var password = text.password.value;
		var password1 = text.password1.value;
		var errormsg = new Array();

		if (password.length == 0) {
			errormsg[0] = "Password must not be empty!";
		}
		if (password.indexOf(" ") >= 0 && password.length != 0) {
			errormsg[1] = "Password must not contain any blanks!";
		}
		if (password != password1) {
			errormsg[2] = "Passwords are different!";
		}		
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>

<h1>{$dpuser.firstname} {$dpuser.lastname}</h1>
	<p>
	<table>
		{if $dpuser.imagesize != ""}
			<tr><td></td><td><img src="get_image.php?id={$dpuser.id}" {$dpuser.imagesize} alt="{$dpuser.imagename}"></td></tr>
		{/if}
		<tr>
			<td>Username:</td><td>{$dpuser.username}</td>
		{if $changePW}
			{if $password_error}
			<tr>
				<td colspan=2 class="alert">{$password_error}</td>
			</tr>
			{/if}
			<tr>
				<form name="changePWForm" method="post" action="changepw_action.php" onSubmit="return validChangePWForm(this);" enctype="multipart/form-data">
					<td><label>Password : </label><br>
						<label>Re-type : </label></td>
					<td><input type="password" name="password"><br>
						<input type="password" name="password1">						
						<input type="hidden" name="username" value="{$dpuser.username}">
						<input type="hidden" name="id" value="{$dpuser.id}">
						<input type="submit" value="Change"></td>
				</form>
			</tr>
		{/if}
			<tr><td>Email:</td><td>{$dpuser.email}</td></tr>
			<tr><td>Category:</td><td>{$dpuser.category}</td></tr>
		{if $dpuser.employer}
			<tr><td>Employer:</td><td>
				{foreach $employers as $employer}
					{if $dpuser.employer == $employer.id}
						{$employer.name|escape}
					{/if}
				{/foreach}
			</td></tr>
		{/if}
			<tr><td>Phone No:</td><td>{$dpuser.phoneno}</td></tr>
	</p>
	<p>
		<tr><td><a href="index.php">User Home</a></td>
	{if $user == 'Chris'}
		<td><a href="change_position.php?id={$dpuser.id}">Change Position</a></td></tr>
	{/if}
	</p>
	</table>
{/block}
