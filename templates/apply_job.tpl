{extends file="base.tpl"}

{block name=title}Apply job page{/block}

{block name=content}

<!-- validation for apply job form -->
<script type="text/javascript">

	function validApplyJobForm(text) {
		var applicationletter = text.applicationletter.value;
		var errormsg = new Array();

		if (applicationletter.length == 0) {
			errormsg[0] = "Application Letter must not be empty!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}

</script>

<h1>Apply for this job</h1>

{if $redundancy}
	<font size="4" color="red">You already applied for this job!!</font>
{else}
	<form name="applyJobForm" method="post" action="apply_job_action.php" onSubmit="return validApplyJobForm(this);">
    	<table>
    		<tr><td>Name:</td><td><input type="hidden" name="username" value="{$id}">{$firstname} {$lastname}</td></tr>
	    	<tr><td>Job:</td> <td><input type="hidden" name="job" value="{$job.id}">{$job.title}</td></tr>
    		<tr><td colspan=2>Application Letter:</td></tr>
    		<tr><td colspan=2><textarea name="applicationletter" rows="20" cols="50"></textarea></td></tr>
	    	<tr><td colspan=2><input type="submit" value="Apply">
    	</table>
	</form>
{/if}
{/block}
