{extends file="base.tpl"}

{block name=title}Employer home page{/block}

{block name=content}
<body>
	<h1>Employers</h1>

	{if $employers}
		<ul>
			{foreach $employers as $employer}
				<li><a href="employer_detail.php?id={$employer.id}">{$employer.name|escape}</a></li>
			{/foreach}
		</ul>
	{else}
		<p>No employers found.</p>
	{/if}
{/block}
