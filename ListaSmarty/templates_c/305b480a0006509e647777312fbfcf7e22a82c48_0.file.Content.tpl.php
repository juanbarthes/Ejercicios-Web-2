<?php
/* Smarty version 3.1.36, created on 2020-09-27 22:41:55
  from 'C:\xampp\htdocs\web2\ListaSmarty\templates\Content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f70f913561cb7_36137364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '305b480a0006509e647777312fbfcf7e22a82c48' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\ListaSmarty\\templates\\Content.tpl',
      1 => 1601239311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Header.tpl' => 1,
    'file:Footer.tpl' => 1,
  ),
),false)) {
function content_5f70f913561cb7_36137364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:Header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
<ul class="list-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frutas']->value, 'fruta');
$_smarty_tpl->tpl_vars['fruta']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fruta']->value) {
$_smarty_tpl->tpl_vars['fruta']->do_else = false;
?>
    <li class="list-group-item list-group-item-action"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['fruta']->value, 'UTF-8');?>
</li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php $_smarty_tpl->_subTemplateRender("file:Footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
