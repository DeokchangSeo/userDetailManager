<?php /* Smarty version Smarty-3.1.19, created on 2015-07-03 09:46:16
         compiled from "./templates/user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5521429555963dc86b5626-91886105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f157ed3694b4fa8e43ed813a34c6fde825df3654' => 
    array (
      0 => './templates/user_list.tpl',
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
  'nocache_hash' => '5521429555963dc86b5626-91886105',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55963dc87e5dc8_70777829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55963dc87e5dc8_70777829')) {function content_55963dc87e5dc8_70777829($_smarty_tpl) {?><!DOCTYPE html>
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
					
	<h1>Users</h1>

	<?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['user']->value['username']=='Chris') {?>
					<li><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['category'], ENT_QUOTES, 'UTF-8', true);?>
)</li>
				<?php } else { ?>
					<li><a href="user_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['category'], ENT_QUOTES, 'UTF-8', true);?>
)</a></li>
				<?php }?>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<p>No users found.</p>
	<?php }?>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
