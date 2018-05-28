<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 19:41:13
         compiled from "./templates/job_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153996611954116e392d87f5-54676377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5eca03b808631fc4f1ee6f3fc9049bc195214eb' => 
    array (
      0 => './templates/job_detail.tpl',
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
  'nocache_hash' => '153996611954116e392d87f5-54676377',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54116e394300c7_61018281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54116e394300c7_61018281')) {function content_54116e394300c7_61018281($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Job details page</title>
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
					

<h1><?php echo $_smarty_tpl->tpl_vars['job']->value['title'];?>
</h1>
	<p>
		Employer: <a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['employer']->value['name'];?>
</a>
    <p>
		Location: <?php echo $_smarty_tpl->tpl_vars['job']->value['location'];?>

	<p>
		Description: <?php echo $_smarty_tpl->tpl_vars['job']->value['description'];?>

	<p>
		Salary: <?php echo $_smarty_tpl->tpl_vars['job']->value['salary'];?>

	<p>
		Updated Date: <?php echo $_smarty_tpl->tpl_vars['job']->value['epoch'];?>

	<p>
		Final Date: <?php echo $_smarty_tpl->tpl_vars['job']->value['duedate'];?>

	<p>
		<?php if ($_smarty_tpl->tpl_vars['remaintime']->value==0) {?>
			Time remaining: <font class="alert">Expired</font>
		<?php } else { ?>
			Time remaining: <?php echo $_smarty_tpl->tpl_vars['remaintime']->value;?>

		<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['category']->value=='manager'&&$_smarty_tpl->tpl_vars['employer']->value['id']==$_smarty_tpl->tpl_vars['employerID']->value) {?>
		<p>
			<a href="delete_job_action.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
">Delete this job</a> 
		<p>
			<a href="update_job.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
">Update this job</a>

		<?php if ($_smarty_tpl->tpl_vars['applications']->value) {?>
			<h2>Applicants for this job</h2>
		
			<ul>
				<?php  $_smarty_tpl->tpl_vars['application'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['application']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['applications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['application']->key => $_smarty_tpl->tpl_vars['application']->value) {
$_smarty_tpl->tpl_vars['application']->_loop = true;
?>
					<li><a href="application.php?applicationID=<?php echo $_smarty_tpl->tpl_vars['application']->value['id'];?>
&jobID=<?php echo $_smarty_tpl->tpl_vars['application']->value['jobID'];?>
"><?php echo $_smarty_tpl->tpl_vars['application']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['application']->value['lastname'];?>
</a></li>
				<?php } ?>
			</ul>
		<?php } else { ?>
			<h2>Applicants for this job</h2>
			<p>No applicant found.</p>
		<?php }?>

	<?php } elseif ($_smarty_tpl->tpl_vars['category']->value=='user') {?>
		<p>
			<a href="apply_job.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
">Apply</a>
	<?php }?>


				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
