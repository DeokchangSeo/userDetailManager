{extends file="base.tpl"}

{block name=title}User home page{/block}

{block name=content}
<h1>Jobs</h1>

<ul>
	<li><a href="job_list.php">View all jobs</a></li>
	<li>
		<form method="get" action="job_list.php">
			<label>Search for a job:</label>
			<input type="text" name="query">
			<input type="submit" value="Search">
		</form>
	</li>
</ul>

{if $jobs}
	<h2>Recently-added Jobs</h2>

	<ul>
		{foreach $jobs as $job}
			<li><a href="job_detail.php?id={$job.id}&is_employer=true">{$job.title}</a></li>
		{/foreach}
	</ul>
{else}
	<p>No job found.</p>
{/if}

{/block}