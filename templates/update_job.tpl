{extends file="base.tpl"}

{block name=title}Update job page{/block}

{block name=content}
<h1>Update job</h1>

<form method="post" action="update_job_action.php">
	<input type="hidden" name="id" value="{$job.id}">
	<input type="hidden" name="employer" value="{$job.employer}">
	
	<table>
		{if $title_error}
			<tr>
				<td colspan=2 class="alert">{$title_error}</td>
			</tr>
		{/if}
			<tr>
				<td>Title:</td>
				<td><input type="text" name="title" value="{$job.title}"> <br></td>
			</tr>
		{if $location_error}
			<tr>
				<td colspan=2 class="alert">{$location_error}</td>
			</tr>
		{/if}
			<tr>
				<td>Location:</td> 
				<td><input type="text" name="location" value="{$job.location}"> <br></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><textarea name="description">{$job.description}</textarea> <br></td>
			</tr>
		{if $salary_error}
			<tr>
				<td colspan=2 class="alert">{$salary_error}</td>
			</tr>
		{/if}
			<tr>
				<td>Salary:</td>
				<td><input type="text" name="salary" value="{$job.salary}"> <br></td>
			</tr>
			<tr>
				<td><input type="submit" value="Update job"></td>
			</tr>
	</table>
</form>
{/block}
