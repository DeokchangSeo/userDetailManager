<!DOCTYPE html>
<html>
	<head>
		<title>{block name=title}Default title{/block}</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/wp.css">
	</head>
	<body>
		{include 'header.tpl'}
		<section>
			<div id="centreContent">
				<div id="leftColumn">
					<h2>&nbsp Menu</h2>
					<ul>
						<li><a href="employers.php">Employer page</a></li>
						<li><a href="index.php">User page</a></li>
						<li><a href="docs/doc.html">Documentation</a></li>
					</ul>
				</div>
				<div id="centreColumn">
					{block name=content}
					{/block}
				</div>
			</div>
		</section>
		{include 'footer.tpl'}
	</body>
</html>