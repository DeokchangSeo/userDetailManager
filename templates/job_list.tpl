{extends file="base.tpl"}

{block name=title}Job list page{/block}

{block name=content}

	{if $query}
		<h1>Jobs for '{$query}'</h1>
	{else}
		<h1>Jobs</h1>
	{/if}

	{if $jobs}
		<ul>
			{foreach $jobs as $job}
				<li><a href="job_detail.php?id={$job.id}">{$job.title|escape}</a></li>
			{/foreach}
		</ul>
	{else}
		<p>No jobs found.</p>
	{/if}

	{if ($num_jobs < 6)}
		First Previous 1 Next Last
	{else if}
		<a href="job_list.php?query={$query}&offset=0">First</a>
		{if $offset-$jobs_per_page < 0}
			<a href="job_list.php?query={$query}&offset=0">Previous</a>
		{else}
			<a href="job_list.php?query={$query}&offset={$offset-$jobs_per_page}">Previous</a>
		{/if}

		{for $page=1 to ceil($num_jobs/$jobs_per_page)}
		    {if ($page == ceil($offset/$jobs_per_page) + 1)}
		    	{$page}
		    {else}
			    <a href="job_list.php?query={$query}&offset={($page-1)*$jobs_per_page}">{$page}</a>
			{/if}
		{/for}

		{if $offset == (($total_pages-1)*$jobs_per_page)}
			<a href="job_list.php?query={$query}&offset={($total_pages-1)*$jobs_per_page}">Next</a>
		{else}
			<a href="job_list.php?query={$query}&offset={$offset+$jobs_per_page}">Next</a>
		{/if}
		<a href="job_list.php?query={$query}&offset={($total_pages-1)*$jobs_per_page}">Last</a>
	{/if}

{/block}
