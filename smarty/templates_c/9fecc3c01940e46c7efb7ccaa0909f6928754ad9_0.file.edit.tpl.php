<?php
/* Smarty version 3.1.33, created on 2024-09-23 10:22:38
  from 'D:\PrestaPHP\Website\smarty\templates\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_66f1254ea069b1_49307946',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fecc3c01940e46c7efb7ccaa0909f6928754ad9' => 
    array (
      0 => 'D:\\PrestaPHP\\Website\\smarty\\templates\\edit.tpl',
      1 => 1727079749,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66f1254ea069b1_49307946 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj projekt</title>
</head>
<body>
    if ($action == 'edit') {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nazwa = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $data_rozpoczecia = $_POST['data_rozpoczecia'];
        $status = $_POST['status'];

        $sql = "UPDATE projekty SET nazwa = :nazwa, opis = :opis, data_rozpoczecia = :data_rozpoczecia, status = :status WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nazwa' => $nazwa,
            'opis' => $opis,
            'data_rozpoczecia' => $data_rozpoczecia,
            'status' => $status,
            'id' => $id,
        ]);

        header('Location: index.php'); // Przekierowanie po edytowaniu
        exit;
    } else {
        $sql = "SELECT * FROM projekty WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $projekt = $stmt->fetch();

        if ($projekt) {
            $smarty->assign('projekt', $projekt);
            $smarty->display('edit.tpl');
        } else {
            echo "Projekt nie został znaleziony.";
            exit;
        }
    }
}

<?php }
}
