<?php
/* Smarty version 3.1.33, created on 2024-09-23 10:43:12
  from 'D:\PrestaPHP\Website\smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_66f12a20bd0a23_30404680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b731d86ba780b6a360bf54550ace18b9dd614ca6' => 
    array (
      0 => 'D:\\PrestaPHP\\Website\\smarty\\templates\\index.tpl',
      1 => 1727080049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66f12a20bd0a23_30404680 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
    <link rel="stylesheet" type="text/css" href="smarty/templates/styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    
    <table>
        <thead>
            <tr>
                <th>Nazwa projektu</th>
                <th>Opis</th>
                <th>Data rozpoczęcia</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projekty']->value, 'projekt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['projekt']->value) {
?>
            <tr>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['nazwa'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['opis'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['data_rozpoczecia'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['status'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">Edytuj</a>
                    <a href="index.php?action=delete&id=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['projekt']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" onclick="return confirm('Czy na pewno chcesz usunąć ten projekt?');">Usuń</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    
    <a href="index.php?action=add">Dodaj nowy projekt</a>
</body>
</html>
<?php }
}
