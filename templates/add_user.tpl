{extends file="base.tpl"}

{block name=title}Add User page{/block}

{block name=content}

<!-- validation for add user form -->
<script type="text/javascript">

	function validAddUserForm(text) {

		var username = text.username.value;
		var password = text.password.value;
		var email = text.email.value;
		var firstname = text.firstname.value;
		var lastname = text.lastname.value;
		var phoneno = text.phoneno.value;
				
		var errormsg = new Array();

		if (username.length == 0) {
			errormsg[0] = "Username must not be empty!";
		}
		if (password.length == 0) {
			errormsg[1] = "Password must not be empty!";
		}
		if (password.indexOf(" ") >= 0 && password.length != 0) {
			errormsg[2] = "Password must not contain any blanks!";
		}
		if (email.length == 0) {
			errormsg[3] = "Email must not be empty!";
		}
		if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") || email.lastIndexOf(".")+2 >= email.length) {
			errormsg[4] = "Not a valid e-mail address!";
		}
		if (firstname.length == 0) {
			errormsg[5] = "Firstname must not be empty!";
		}
		if (lastname.length == 0) {
			errormsg[6] = "Lastname must not be empty!";
		}
		if (phoneno.length == 0) {
			errormsg[7] = "Phone number must not be empty!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>
		
{if $admin}
	<h1>{$admin}</h1>
{else}
	<h1>Add new user</h1>
{/if}
	{if $error}
	    <p>{$error}</p>
	{/if}

	<form name="addUserForm" method="post" action="add_user_action.php" onSubmit="return validAddUserForm(this);" enctype="multipart/form-data">
	    <table>
		    <tr><td>Username:	</td><td><input type="text" name="username"></td></tr>
	    	<tr><td>Password:	</td><td><input type="password" name="password"></td></tr>
		    <tr><td>email:		</td><td><input type="text" name="email"></td></tr>
			<tr><td>Firstname:	</td><td><input type="text" name="firstname"></td></tr>
			<tr><td>Lastname:	</td><td><input type="text" name="lastname"></td></tr>
			<tr><td>phoneno:	</td><td><input type="text" name="phoneno"></td></tr>
			<tr><td class="col1"> Image file </td>
				<td class="col2"> 
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<input type="file" name="userfile" size=30> 
				</td>
			</tr>

			{if $admin}
				<tr><td>Employer:</td><td>
					<select name="employers">
						{if $employers}
							{foreach $employers as $employer}
								<option value="{$employer.id}">{$employer.name|escape}
							{/foreach}
						{/if}
					</select>
				</td></tr>
				<tr><td></td><td><input type="hidden" name="category" value="manager"></td></tr>
			{else}
				<tr><td></td><td><input type="hidden" name="category" value="user"></td></tr>
			{/if}
			<tr><td colspan=2><input type="submit" value="Confirm">
		</table>
	</form>
{/block}
