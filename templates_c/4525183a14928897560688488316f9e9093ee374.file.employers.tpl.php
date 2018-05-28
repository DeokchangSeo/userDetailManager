<?php /* Smarty version Smarty-3.1.19, created on 2014-09-11 19:41:29
         compiled from "./templates/employers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134137336054116e49c65f66-65181885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4525183a14928897560688488316f9e9093ee374' => 
    array (
      0 => './templates/employers.tpl',
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
  'nocache_hash' => '134137336054116e49c65f66-65181885',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54116e49d36c68_04227425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54116e49d36c68_04227425')) {function content_54116e49d36c68_04227425($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Employer home page</title>
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
					
<body>
	<h1>Employers</h1>

	<?php if ($_smarty_tpl->tpl_vars['employers']->value) {?>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['employer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['employer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['employer']->key => $_smarty_tpl->tpl_vars['employer']->value) {
$_smarty_tpl->tpl_vars['employer']->_loop = true;
?>
				<li><a href="employer_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['employer']->value['id'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['employer']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></li>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<p>No employers found.</p>
	<?php }?>

				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</body>
</html><?php }} ?>
