<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 19:34:39
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178779028554116cafa83ab7-13360210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2729b2f2e19cc77d7e775984b402c2cb9e06d315' => 
    array (
      0 => './templates/index.tpl',
      1 => 1337950132,
      2 => 'file',
    ),
    'f90e1f5311553b8d5de4ce069c232b01183b0470' => 
    array (
      0 => './templates/base.tpl',
      1 => 1337950132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178779028554116cafa83ab7-13360210',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54116cafb74b86_33849198',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54116cafb74b86_33849198')) {function content_54116cafb74b86_33849198($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>User home page</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles/wp.css">
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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

<?php if ($_smarty_tpl->tpl_vars['jobs']->value) {?>
	<h2>Recently-added Jobs</h2>

	<ul>
		<?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
			<li><a href="job_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
&is_employer=true"><?php echo $_smarty_tpl->tpl_vars['job']->value['title'];?>
</a></li>
		<?php } ?>
	</ul>
<?php } else { ?>
	<p>No job found.</p>
<?php }?>


				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
