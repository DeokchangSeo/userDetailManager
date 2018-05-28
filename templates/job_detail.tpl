{extends file="base.tpl"}

{block name=title}Job details page{/block}

{block name=content}

<h1>{$job.title}</h1>
	<p>
		Employer: <a href="employer_detail.php?id={$employer.id}">{$employer.name}</a>
    <p>
		Location: {$job.location}
	<p>
		Description: {$job.description}
	<p>
		Salary: {$job.salary}
	<p>
		Updated Date: {$job.epoch}
	<p>
		Final Date: {$job.duedate}
	<p>
		{if $remaintime == 0}
			Time remaining: <font class="alert">Expired</font>
		{else}
			Time remaining: {$remaintime}
		{/if}

	{if $category == 'manager' && $employer.id == $employerID}
		<p>
			<a href="delete_job_action.php?id={$job.id}">Delete this job</a> 
		<p>
			<a href="update_job.php?id={$job.id}">Update this job</a>

		{if $applications}
			<h2>Applicants for this job</h2>
		
			<ul>
				{foreach $applications as $application}
					<li><a href="application.php?applicationID={$application.id}&jobID={$application.jobID}">{$application.firstname} {$application.lastname}</a></li>
				{/foreach}
			</ul>
		{else}
			<h2>Applicants for this job</h2>
			<p>No applicant found.</p>
		{/if}

	{else if $category == 'user'}
		<p>
			<a href="apply_job.php?id={$job.id}">Apply</a>
	{/if}

{/block}
