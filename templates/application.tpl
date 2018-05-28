{extends file="base.tpl"}

{block name=title}Application details page{/block}

{block name=content}

<h1>{$job.title}</h1>
	{if $application == 1}
	
	{else}
	<p>
		{if $application.imagesize != ""}
			&nbsp&nbsp&nbsp
			<img src="get_image.php?id={$application.id}" {$application.imagesize} alt="{$application.imagename}">
		{/if}
	<p>
		Applicant name: <a href="user_detail.php?id={$application.applicant}">{$application.firstname} {$application.lastname}</a>
    <p>
		Application Letter: {$application.letter}
	<p>
		Time: {$application.epoch}
	{/if}
{/block}
