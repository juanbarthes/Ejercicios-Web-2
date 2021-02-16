<?php
/* Smarty version 3.1.36, created on 2020-09-28 01:51:11
  from 'C:\xampp\htdocs\web2\FormSmarty\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f71256f7ae527_38838992',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3667287b0110084dc3c5d07241f03a3b107a2ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\FormSmarty\\templates\\success.tpl',
      1 => 1601246822,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 2,
  ),
),false)) {
function content_5f71256f7ae527_38838992 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\web2\\FormSmarty\\libs\\smarty\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div>
    <h1>Su registro fue exitoso</h1>
    <hr>
    <h2>Nombre: <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</h2>
    <h2>Email: <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['email']->value,6);?>
</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia ad enim asperiores eius sunt eligendi aperiam aut, eveniet fugit unde aspernatur soluta tenetur recusandae odio sed at blanditiis. Nobis, modi?</p>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
