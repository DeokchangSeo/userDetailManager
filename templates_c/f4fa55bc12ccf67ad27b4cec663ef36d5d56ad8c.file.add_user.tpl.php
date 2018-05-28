<?php /* Smarty version Smarty-3.1.19, created on 2015-07-03 09:57:45
         compiled from "./templates/add_user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:906022562559640796040b7-97000311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4fa55bc12ccf67ad27b4cec663ef36d5d56ad8c' => 
    array (
      0 => './templates/add_user.tpl',
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
  'nocache_hash' => '906022562559640796040b7-97000311',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559640797321b0_52953469',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559640797321b0_52953469')) {function content_559640797321b0_52953469($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Add User page</title>
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
					

<!-- validation for add user form -->
<script type="text/javascript">

	function validAddUserForm(text) {

		var username = text.username.value;
		var password = text.password.value;
		var email = text.email.value;
		var firstname = text.firstname.value;
		var lastname = text.lastname.value;
		var phoneno = text.phoneno.value;
				
		var errormsg = new Array();

		if (username.length == 0) {
			errormsg[0] = "Username must not be empty!";
		}
		if (password.length == 0) {
			errormsg[1] = "Password must not be empty!";
		}
		if (password.indexOf(" ") >= 0 && password.length != 0) {
			errormsg[2] = "Password must not contain any blanks!";
		}
		if (email.length == 0) {
			errormsg[3] = "Email must not be empty!";
		}
		if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") || email.lastIndexOf(".")+2 >= email.length) {
			errormsg[4] = "Not a valid e-mail address!";
		}
		if (firstname.length == 0) {
			errormsg[5] = "Firstname must not be empty!";
		}
		if (lastname.length == 0) {
			errormsg[6] = "Lastname must not be empty!";
		}
		if (phoneno.length == 0) {
			errormsg[7] = "Phone number must not be empty!";
		}
		if (errormsg.length != 0) {
			alert(errormsg.join("\n"));
			return false;
		}
		return true;
	}
</script>
		
<?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
	<h1><?php echo $_smarty_tpl->tpl_vars['admin']->value;?>
</h1>
<?php } else { ?>
	<h1>Add new user</h1>
<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
	    <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
	<?php }?>

	<form name="addUserForm" method="post" action="add_user_action.php" onSubmit="return validAddUserForm(this);" enctype="multipart/form-data">
	    <table>
		    <tr><td>Username:	</td><td><input type="text" name="username"></td></tr>
	    	<tr><td>Password:	</td><td><input type="password" name="password"></td></tr>
		    <tr><td>email:		</td><td><input type="text" name="email"></td></tr>
			<tr><td>Firstname:	</td><td><input type="text" name="firstname"></td></tr>
			<tr><td>Lastname:	</td><td><input type="text" name="lastname"></td></tr>
			<tr><td>phoneno:	</td><td><input type="text" name="phoneno"></td></tr>
			<tr><td class="col1"> Image file </td>
				<td class="col2"> 
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<input type="file" name="userfile" size=30> 
				</td>
			</tr>

			<?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
				<tr><td>Employer:</td><td>
					<select name="employers">
						<?php if ($_smarty_tpl->tpl_vars['employers']->value) {?>
							<?php  $_smarty_tpl->tpl_vars['employer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['employer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['employer']->key => $_smarty_tpl->tpl_vars['employer']->value) {
$_smarty_tpl->tpl_vars['employer']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['employer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

							<?php } ?>
						<?php }?>
					</select>
				</td></tr>
				<tr><td></td><td><input type="hidden" name="category" value="manager"></td></tr>
			<?php } else { ?>
				<tr><td></td><td><input type="hidden" name="category" value="user"></td></tr>
			<?php }?>
			<tr><td colspan=2><input type="submit" value="Confirm">
		</table>
	</form>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
