{extends file="base.tpl"}

{block name=title}Change user job position page{/block}

{block name=content}

<!-- validation for change job position form -->
<script type="text/javascript">

	function validChangePositionForm(text) {
		var category = text.category.value;
		var employer = text.employer.value;
		
		var errormsg = new Array();

		if (category == 'manager' && employer == 0) {
			errormsg[0] = "Manager must choose an employer!";
		}
		if (category == 'user' && employer != 0) {
			errormsg[1] = "User does not need to choose an employer!";
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
		<form method="post" action="change_position_action.php" onSubmit="return validChangePositionForm(this);">
			{if $dpuser.imagesize != ""}
				<tr><td></td><td><img src="get_image.php?id={$dpuser.id}" {$dpuser.imagesize} alt="{$dpuser.imagename}"></td></tr>
			{/if}
			<tr><td>Username:</td><td>{$dpuser.username}</td></tr>
			<tr><td>Email:</td><td>{$dpuser.email}</td></tr>
			<tr><td>Category:</td><td>{$dpuser.category}</td>
			<td>
				<select name="category">
					<option value="manager">Manager
					<option value="user">User
				</select>
			</td>
			</tr>
			<tr><td>Employer:</td><td>
				{foreach $employers as $employer}
					{if $dpuser.employer == $employer.id}
						{$employer.name|escape}
					{/if}
				{/foreach}
			</td>
			<td>
				<select name="employer">
					<option value="0">
						{foreach $employers as $employer}
							<option value="{$employer.id}">{$employer.name|escape}
						{/foreach}
					</select>
			</td>
			</tr>
			<tr><td>Phone No:</td><td>{$dpuser.phoneno}</td></tr>
			<input type="hidden" name="id" value="{$dpuser.id}">
			<tr><td colspan=2><input type="submit" value="Change job position">
		</form>
	</table>
	</p>
{/block}
