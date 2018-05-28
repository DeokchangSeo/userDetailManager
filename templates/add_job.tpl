{extends file="base.tpl"}

{block name=title}Offer new job page{/block}

{block name=content}

<h1>Offer new job</h1>

<!-- validation for add job form -->
<script type="text/javascript">

	function validAddJobForm(text) {

		var title = text.title.value;
		var location = text.location.value;
		var salary = text.salary.value;
		var date = text.date.value;
		
		var errormsg = new Array();
	
		if (title.length == 0) {
			errormsg[0] = "Title must not be empty!";
		}
		if (location.length == 0) {
			errormsg[1] = "Location must not be empty!";
		}
		if (salary.length == 0) {
			errormsg[2] = "Salary must not be empty!";
		}
		if (date.length == 0) {
			errormsg[3] = "Date must not be empty!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>

<form method="post" action="add_job_action.php">
	{* <input type="hidden" name="employer" value="{$employer}"> *}
    <table>
    	<tr><td>Title:</td> <td><input type="text" name="title"></td></tr>
    	<tr><td>Location:</td> <td><input type="text" name="location"></td></tr>
    	<tr><td>Description:</td> <td><textarea name="description"></textarea></td></tr>
    	<tr><td>Salary:</td> <td><input type="text" name="salary"></td></tr>
    	<tr><td>Due date:</td> <td><input type="text" name="date"></td></tr>
    	<tr><td colspan=2><input type="submit" value="Add job">
    </table>
</form>

{/block}
