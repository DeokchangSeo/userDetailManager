<?php /* Smarty version Smarty-3.1.19, created on 2015-07-03 09:58:18
         compiled from "./templates/change_position.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13255799615596409a430085-55837125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41c6f613eeb711609e7c0b9a230a006f89ea3651' => 
    array (
      0 => './templates/change_position.tpl',
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
  'nocache_hash' => '13255799615596409a430085-55837125',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5596409a576c11_98503900',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5596409a576c11_98503900')) {function content_5596409a576c11_98503900($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Change user job position page</title>
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
					

<!-- validation for change job position form -->
<script type="text/javascript">

	function validChangePositionForm(text) {
		var category = text.category.value;
		var employer = text.employer.value;
		
		var errormsg = new Array();

		if (category == 'manager' && employer == 0) {
			errormsg[0] = "Manager must choose an employer!";
		}
		if (category == 'user' && employer != 0) {
			errormsg[1] = "User does not need to choose an employer!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>

<h1><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['dpuser']->value['lastname'];?>
</h1>
	<p>
	<table>
		<form method="post" action="change_position_action.php" onSubmit="return validChangePositionForm(this);">
			<?php if ($_smarty_tpl->tpl_vars['dpuser']->value['imagesize']!='') {?>
				<tr><td></td><td><img src="get_image.php?id=<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['dpuser']->value['imagesize'];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['imagename'];?>
"></td></tr>
			<?php }?>
			<tr><td>Username:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['username'];?>
</td></tr>
			<tr><td>Email:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['email'];?>
</td></tr>
			<tr><td>Category:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['category'];?>
</td>
			<td>
				<select name="category">
					<option value="manager">Manager
					<option value="user">User
				</select>
			</td>
			</tr>
			<tr><td>Employer:</td><td>
				<?php  $_smarty_tpl->tpl_vars['employer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['employer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['employer']->key => $_smarty_tpl->tpl_vars['employer']->value) {
$_smarty_tpl->tpl_vars['employer']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['dpuser']->value['employer']==$_smarty_tpl->tpl_vars['employer']->value['id']) {?>
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['employer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

					<?php }?>
				<?php } ?>
			</td>
			<td>
				<select name="employer">
					<option value="0">
						<?php  $_smarty_tpl->tpl_vars['employer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['employer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['employer']->key => $_smarty_tpl->tpl_vars['employer']->value) {
$_smarty_tpl->tpl_vars['employer']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['employer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

						<?php } ?>
					</select>
			</td>
			</tr>
			<tr><td>Phone No:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['phoneno'];?>
</td></tr>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['id'];?>
">
			<tr><td colspan=2><input type="submit" value="Change job position">
		</form>
	</table>
	</p>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
