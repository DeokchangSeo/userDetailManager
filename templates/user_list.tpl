{extends file="base.tpl"}

{block name=title}User home page{/block}

{block name=content}
	<h1>Users</h1>

	{if $users}
		<ul>
			{foreach $users as $user}
				{if $user.username == 'Chris'}
					<li>{$user.username|escape} ({$user.category|escape})</li>
				{else}
					<li><a href="user_detail.php?id={$user.id}">{$user.username|escape} ({$user.category|escape})</a></li>
				{/if}
			{/foreach}
		</ul>
	{else}
		<p>No users found.</p>
	{/if}
{/block}
