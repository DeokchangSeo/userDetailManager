<?php /* Smarty version Smarty-3.1.19, created on 2015-07-03 09:58:12
         compiled from "./templates/user_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42453367455964094a43788-59965628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d41f12b8fd8f962adce98fd8aac7b0fa6864cc6' => 
    array (
      0 => './templates/user_detail.tpl',
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
  'nocache_hash' => '42453367455964094a43788-59965628',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55964094bafe12_28506726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55964094bafe12_28506726')) {function content_55964094bafe12_28506726($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>User detail page</title>
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
					

<!-- validation for change password form -->		
<script type="text/javascript">

	function validChangePWForm(text) {

		var password = text.password.value;
		var password1 = text.password1.value;
		var errormsg = new Array();

		if (password.length == 0) {
			errormsg[0] = "Password must not be empty!";
		}
		if (password.indexOf(" ") >= 0 && password.length != 0) {
			errormsg[1] = "Password must not contain any blanks!";
		}
		if (password != password1) {
			errormsg[2] = "Passwords are different!";
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
		<?php if ($_smarty_tpl->tpl_vars['dpuser']->value['imagesize']!='') {?>
			<tr><td></td><td><img src="get_image.php?id=<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['id'];?>
" <?php echo $_smarty_tpl->tpl_vars['dpuser']->value['imagesize'];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['imagename'];?>
"></td></tr>
		<?php }?>
		<tr>
			<td>Username:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['username'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['changePW']->value) {?>
			<?php if ($_smarty_tpl->tpl_vars['password_error']->value) {?>
			<tr>
				<td colspan=2 class="alert"><?php echo $_smarty_tpl->tpl_vars['password_error']->value;?>
</td>
			</tr>
			<?php }?>
			<tr>
				<form name="changePWForm" method="post" action="changepw_action.php" onSubmit="return validChangePWForm(this);" enctype="multipart/form-data">
					<td><label>Password : </label><br>
						<label>Re-type : </label></td>
					<td><input type="password" name="password"><br>
						<input type="password" name="password1">						
						<input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['username'];?>
">
						<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['id'];?>
">
						<input type="submit" value="Change"></td>
				</form>
			</tr>
		<?php }?>
			<tr><td>Email:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['email'];?>
</td></tr>
			<tr><td>Category:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['category'];?>
</td></tr>
		<?php if ($_smarty_tpl->tpl_vars['dpuser']->value['employer']) {?>
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
			</td></tr>
		<?php }?>
			<tr><td>Phone No:</td><td><?php echo $_smarty_tpl->tpl_vars['dpuser']->value['phoneno'];?>
</td></tr>
	</p>
	<p>
		<tr><td><a href="index.php">User Home</a></td>
	<?php if ($_smarty_tpl->tpl_vars['user']->value=='Chris') {?>
		<td><a href="change_position.php?id=<?php echo $_smarty_tpl->tpl_vars['dpuser']->value['id'];?>
">Change Position</a></td></tr>
	<?php }?>
	</p>
	</table>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
