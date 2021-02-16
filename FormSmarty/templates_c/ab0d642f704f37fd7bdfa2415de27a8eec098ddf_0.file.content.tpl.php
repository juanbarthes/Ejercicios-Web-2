<?php
/* Smarty version 3.1.36, created on 2020-09-28 01:56:02
  from 'C:\xampp\htdocs\web2\FormSmarty\templates\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f712692a09c98_25409990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab0d642f704f37fd7bdfa2415de27a8eec098ddf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2\\FormSmarty\\templates\\content.tpl',
      1 => 1601250950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f712692a09c98_25409990 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>
    <hr>
    <form action="validate" method="POST">
        <div class="form-group">
          <label for="name">Your name</label>
          <input type="text" class="form-control" id="name" name="name" value=<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password1">Password</label>
          <input type="password" class="form-control" id="password1" name="password1">
        </div>
        <div class="form-group">
            <label for="password2">Password Repeat</label>
            <input type="password" class="form-control" id="password2" name="password2">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <p><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
