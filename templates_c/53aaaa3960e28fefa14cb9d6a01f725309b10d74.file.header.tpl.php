<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 19:34:39
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32176980754116cafb7b009-93953646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53aaaa3960e28fefa14cb9d6a01f725309b10d74' => 
    array (
      0 => './templates/header.tpl',
      1 => 1337950132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32176980754116cafb7b009-93953646',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
    'user' => 0,
    'firstname' => 0,
    'lastname' => 0,
    'category' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54116cafbcb010_96197184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54116cafbcb010_96197184')) {function content_54116cafbcb010_96197184($_smarty_tpl) {?> <!-- Header for Assignment2. -->
 
 <!-- validation for login form -->
<script type="text/javascript">
		
	function validLoginForm(text) {

		var username = text.username.value;
		var password = text.password.value;
				
		var errormsg = new Array();

		if (username.length == 0) {
			errormsg[0] = "Username";
		}
		if (password.length == 0) {
			errormsg[1] = "Password";
		}
		if (errormsg.length != 0) {
			alert("Input " + errormsg.join(" "));
			return false;
		} else {
		
		}
		return true;
	}
</script>
<header>
<hr>
	<span class="sname">Employment</span>
<hr>
	<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
		<table><td colspan="2" class="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</td></table>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
		<table>
			<tr>
				<td><font color="white">Welcome <?php echo $_smarty_tpl->tpl_vars['firstname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['lastname']->value;?>
 (<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
)</font></td>
				<td>
					<form name="login" id="login" method="post" action="logout.php">
						<input type="submit" name="logout" value="Logout">
					</form>
				</td>
				<td>
					<form name="update" id="update" method="get" action="user_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&changePW=change">
						<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
						<input type="submit" name="changePW" value="Change PW">
					</form>
				</td>
				<td>
				<?php if ($_smarty_tpl->tpl_vars['category']->value=='admin') {?>
					<form name="userlist" id="userlist" method="get" action="user_list.php">
						<input type="submit" name="admin" value="User list">
					</form>
				</td>
				<td>
					<form name="addmanager" id="addmanager" method="post" action="add_user.php">
						<input type="submit" name="admin" value="Add Manager">
					</form>
				<?php }?>
				</td>
			</tr>
		</table>
	<?php } else { ?>
		<table>
			<tr>
				<td><form name="login" id="login" method="post" action="login.php" onSubmit="return validLoginForm(this);">
						<label for="username">Username: </label>
						<input type="text" name="username">
						<label for="password">Password: </label> 
						<input type="password" name="password">
						<input type="submit" name="submit" value="Login">
					</form>
				</td>
				<td><form name="adduser" id="adduser" method="post" action="add_user.php">
						<input type="submit" name="submit" value="New Account">
					</form>
				</td>
			</tr>
		</table>
	<?php }?>		
<hr>
</header><?php }} ?>
