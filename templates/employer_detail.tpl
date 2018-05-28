{extends file="base.tpl"}

{block name=title}Employer details page{/block}

{block name=content}
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

	<h1>{$employer.name}</h1>
		<p>Industry: {$employer.industry}
		<p>Description: {$employer.description}

	<h2>Jobs offered by {$employer.name}</h2>

	{if $jobs}
		<ul>
			{foreach $jobs as $job}
				<li><a href="job_detail.php?id={$job.id}&is_employer=true">{$job.title|escape}</a></li>
			{/foreach}
		</ul>
	{else}
		<p>No jobs found.</p>
	{/if}

	{if ($num_jobs < 6)}
		First Previous 1 Next Last
	{else if}
		<a href="employer_detail.php?id={$employer.id}&query={$query}&offset=0">First</a>
		{if $offset-$jobs_per_page < 0}
			<a href="employer_detail.php?id={$employer.id}&query={$query}&offset=0">Previous</a>
		{else}
			<a href="employer_detail.php?id={$employer.id}&query={$query}&offset={$offset-$jobs_per_page}">Previous</a>
		{/if}

		{for $page=1 to ceil($num_jobs/$jobs_per_page)}
		    {if ($page == ceil($offset/$jobs_per_page) + 1)}
	    		{$page}
		    {else}
			    <a href="employer_detail.php?id={$employer.id}&query={$query}&offset={($page-1)*$jobs_per_page}">{$page}</a>
			{/if}
		{/for}

		{if $offset == (($total_pages-1)*$jobs_per_page)}
			<a href="employer_detail.php?id={$employer.id}&query={$query}&offset={($total_pages-1)*$jobs_per_page}">Next</a>
		{else}
			<a href="employer_detail.php?id={$employer.id}&query={$query}&offset={$offset+$jobs_per_page}">Next</a>
		{/if}
		<a href="employer_detail.php?id={$employer.id}&query={$query}&offset={($total_pages-1)*$jobs_per_page}">Last</a>
	{/if}

	{if $category == 'manager' && $employer.id == $employerID}
		<h2>Offer a new job</h2>

		<form name="addJobForm" method="post" action="add_job_action.php" onSubmit="return validAddJobForm(this);">
			<input type="hidden" name="employer" value="{$employer.id}">
			<table>
					<tr><td>Title:</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr><td>Location:</td>
						<td><input type="text" name="location"></td>
					</tr>
					<tr><td>Description:</td>
						<td><textarea name="description"></textarea></td>
					</tr>
					<tr><td>Salary:</td>
						<td><input type="text" name="salary"></td>
					</tr>
					<tr>
						<td>Due date:</td>
						<td><input type="text" name="date"></td>
					</tr>
					<tr><td colspan=2><input type="submit" value="Add job">
			</table>
		</form>
	{else}

	{/if}
{/block}
