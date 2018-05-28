<?php /* Smarty version Smarty-3.1.19, created on 2015-06-14 01:18:23
         compiled from "./templates/job_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1314504731557cba3f64d614-14762383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c8f3bea528e4f25cf89b68cc6edbd70dbd870d7' => 
    array (
      0 => './templates/job_list.tpl',
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
  'nocache_hash' => '1314504731557cba3f64d614-14762383',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557cba3f80a6b2_45567011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557cba3f80a6b2_45567011')) {function content_557cba3f80a6b2_45567011($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Job list page</title>
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
					

	<?php if ($_smarty_tpl->tpl_vars['query']->value) {?>
		<h1>Jobs for '<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
'</h1>
	<?php } else { ?>
		<h1>Jobs</h1>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['jobs']->value) {?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
				<li><a href="job_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['job']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<p>No jobs found.</p>
	<?php }?>

	<?php if (($_smarty_tpl->tpl_vars['num_jobs']->value<6)) {?>
		First Previous 1 Next Last
	<?php } else { ?>
		<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=0">First</a>
		<?php if ($_smarty_tpl->tpl_vars['offset']->value-$_smarty_tpl->tpl_vars['jobs_per_page']->value<0) {?>
			<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=0">Previous</a>
		<?php } else { ?>
			<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value-$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Previous</a>
		<?php }?>

		<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? ceil($_smarty_tpl->tpl_vars['num_jobs']->value/$_smarty_tpl->tpl_vars['jobs_per_page']->value)+1 - (1) : 1-(ceil($_smarty_tpl->tpl_vars['num_jobs']->value/$_smarty_tpl->tpl_vars['jobs_per_page']->value))+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration == 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration == $_smarty_tpl->tpl_vars['page']->total;?>
		    <?php if (($_smarty_tpl->tpl_vars['page']->value==ceil($_smarty_tpl->tpl_vars['offset']->value/$_smarty_tpl->tpl_vars['jobs_per_page']->value)+1)) {?>
		    	<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

		    <?php } else { ?>
			    <a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['page']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
			<?php }?>
		<?php }} ?>

		<?php if ($_smarty_tpl->tpl_vars['offset']->value==(($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value)) {?>
			<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Next</a>
		<?php } else { ?>
			<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value+$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Next</a>
		<?php }?>
		<a href="job_list.php?query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Last</a>
	<?php }?>


				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
