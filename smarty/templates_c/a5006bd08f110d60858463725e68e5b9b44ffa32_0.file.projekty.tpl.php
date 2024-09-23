<?php
/* Smarty version 3.1.33, created on 2024-09-23 12:08:29
  from 'D:\PrestaPHP\WEBSITE\smarty\templates\projekty.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_66f13e1dbf4128_11420300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5006bd08f110d60858463725e68e5b9b44ffa32' => 
    array (
      0 => 'D:\\PrestaPHP\\WEBSITE\\smarty\\templates\\projekty.tpl',
      1 => 1727086076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66f13e1dbf4128_11420300 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\PrestaPHP\\WEBSITE\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scss/styles.css">
    <title>Projekty firmy</title>
</head>
<body>
    <h1>Lista projektów</h1>

    <!-- Formularz dodawania nowego projektu -->
    <h2>Dodaj nowy projekt</h2>
    <form method="POST" action="index.php?action=add">
        <label for="nazwa">Nazwa projektu:</label>
        <input type="text" id="nazwa" name="nazwa" required><br>

        <label for="opis">Opis:</label>
        <textarea id="opis" name="opis" required></textarea><br>

        <label for="data_rozpoczecia">Data rozpoczęcia:</label>
        <input type="date" id="data_rozpoczecia" name="data_rozpoczecia" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="zakończony">Zakończony</option>
            <option value="w trakcie">W trakcie</option>
        </select><br>

        <label for="odpowiedzialny">Odpowiedzialny:</label>
        <input type="text" id="odpowiedzialny" name="odpowiedzialny" required><br>

        <button type="submit">Dodaj projekt</button>
    </form>

    <!-- Formularz wyszukiwania projektów -->
    <form method="GET" action="">
        <label for="search">Szukaj projektu:</label>
        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Wpisz nazwę projektu">
        <button type="submit">Szukaj</button>
    </form>

    <table border="1">
        <tr>
            <th>Nazwa projektu</th>
            <th>Opis</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Status</th>
            <th>Odpowiedzialny</th>
            <th>Czas upływu</th>
            <th>Akcje</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projekty']->value, 'projekt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['projekt']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['projekt']->value['nazwa'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['projekt']->value['opis'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['projekt']->value['data_rozpoczecia'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['projekt']->value['data_zakonczenia']) {
echo $_smarty_tpl->tpl_vars['projekt']->value['data_zakonczenia'];
} else { ?>W trakcie<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['projekt']->value['status'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['projekt']->value['odpowiedzialny'];?>
</td>
            <td>
                <?php $_smarty_tpl->_assignInScope('data_rozpoczecia', $_smarty_tpl->tpl_vars['projekt']->value['data_rozpoczecia']);?>
                <?php $_smarty_tpl->_assignInScope('aktualna_data', smarty_modifier_date_format("now","%Y-%m-%d"));?>
                <?php $_smarty_tpl->_assignInScope('roznica', (strtotime($_smarty_tpl->tpl_vars['aktualna_data']->value)-strtotime($_smarty_tpl->tpl_vars['data_rozpoczecia']->value))/(60*60*24));?>
                <?php if ($_smarty_tpl->tpl_vars['roznica']->value >= 0) {?>
                    <?php echo $_smarty_tpl->tpl_vars['roznica']->value;?>
 dni
                <?php } else { ?>
                    "Niedawno rozpoczęty"
                <?php }?>
            </td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $_smarty_tpl->tpl_vars['projekt']->value['id'];?>
">Edytuj</a>
                <a href="index.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['projekt']->value['id'];?>
" onclick="return confirm('Czy na pewno chcesz usunąć ten projekt?')">Usuń</a>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
</body>
</html>
<?php }
}
