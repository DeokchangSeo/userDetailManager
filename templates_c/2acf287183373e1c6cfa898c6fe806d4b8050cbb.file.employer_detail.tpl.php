<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 19:41:31
         compiled from "./templates/employer_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46141100754116e4b736c64-39581836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2acf287183373e1c6cfa898c6fe806d4b8050cbb' => 
    array (
      0 => './templates/employer_detail.tpl',
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
  'nocache_hash' => '46141100754116e4b736c64-39581836',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54116e4b93f514_66129069',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54116e4b93f514_66129069')) {function content_54116e4b93f514_66129069($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Employer details page</title>
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
					
<!-- validation for add job form -->
<script type="text/javascript">

	function validAddJobForm(text) {

		var title = text.title.value;
		var location = text.location.value;
		var salary = text.salary.value;
		var date = text.date.value;
		
		var errormsg = new Array();
	
		if (title.length == 0) {
			errormsg[0] = "Title must not be empty!";
		}
		if (location.length == 0) {
			errormsg[1] = "Location must not be empty!";
		}
		if (salary.length == 0) {
			errormsg[2] = "Salary must not be empty!";
		}
		if (date.length == 0) {
			errormsg[3] = "Date must not be empty!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>

	<h1><?php echo $_smarty_tpl->tpl_vars['employer']->value['name'];?>
</h1>
		<p>Industry: <?php echo $_smarty_tpl->tpl_vars['employer']->value['industry'];?>

		<p>Description: <?php echo $_smarty_tpl->tpl_vars['employer']->value['description'];?>


	<h2>Jobs offered by <?php echo $_smarty_tpl->tpl_vars['employer']->value['name'];?>
</h2>

	<?php if ($_smarty_tpl->tpl_vars['jobs']->value) {?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['job'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['job']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['jobs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['job']->key => $_smarty_tpl->tpl_vars['job']->value) {
$_smarty_tpl->tpl_vars['job']->_loop = true;
?>
				<li><a href="job_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['job']->value['id'];?>
&is_employer=true"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['job']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<p>No jobs found.</p>
	<?php }?>

	<?php if (($_smarty_tpl->tpl_vars['num_jobs']->value<6)) {?>
		First Previous 1 Next Last
	<?php } else { ?>
		<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=0">First</a>
		<?php if ($_smarty_tpl->tpl_vars['offset']->value-$_smarty_tpl->tpl_vars['jobs_per_page']->value<0) {?>
			<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=0">Previous</a>
		<?php } else { ?>
			<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
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
			    <a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['page']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
			<?php }?>
		<?php }} ?>

		<?php if ($_smarty_tpl->tpl_vars['offset']->value==(($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value)) {?>
			<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Next</a>
		<?php } else { ?>
			<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo $_smarty_tpl->tpl_vars['offset']->value+$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Next</a>
		<?php }?>
		<a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
&query=<?php echo $_smarty_tpl->tpl_vars['query']->value;?>
&offset=<?php echo ($_smarty_tpl->tpl_vars['total_pages']->value-1)*$_smarty_tpl->tpl_vars['jobs_per_page']->value;?>
">Last</a>
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['category']->value=='manager'&&$_smarty_tpl->tpl_vars['employer']->value['id']==$_smarty_tpl->tpl_vars['employerID']->value) {?>
		<h2>Offer a new job</h2>

		<form name="addJobForm" method="post" action="add_job_action.php" onSubmit="return validAddJobForm(this);">
			<input type="hidden" name="employer" value="<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
">
			<table>
					<tr><td>Title:</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr><td>Location:</td>
						<td><input type="text" name="location"></td>
					</tr>
					<tr><td>Description:</td>
						<td><textarea name="description"></textarea></td>
					</tr>
					<tr><td>Salary:</td>
						<td><input type="text" name="salary"></td>
					</tr>
					<tr>
						<td>Due date:</td>
						<td><input type="text" name="date"></td>
					</tr>
					<tr><td colspan=2><input type="submit" value="Add job">
			</table>
		</form>
	<?php } else { ?>

	<?php }?>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
