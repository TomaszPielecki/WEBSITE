<?php
ob_start();
require_once 'libs/Smarty.class.php';
require_once 'db.php';
$smarty = new Smarty();

$smarty->setTemplateDir('smarty/templates');
$smarty->setCompileDir('smarty/templates_c');
$smarty->setCacheDir('smarty/cache');
$smarty->setConfigDir('smarty/configs');

// Połączenie z bazą danych MySQL
$host = 'localhost';
$dbname = 'projekty_firma';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Błąd połączenia z bazą danych: " . $e->getMessage());
    die("Błąd połączenia z bazą danych.");
}

// Funkcja pobierająca projekt na podstawie ID
function getProjectById($pdo, $id) {
    $sql = "SELECT * FROM projekty WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Sprawdzamy, czy użytkownik chce edytować lub usunąć projekt
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($action == 'edit') {
    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nazwa = $_POST['nazwa'];
        $opis = $_POST['opis'];
        $data_rozpoczecia = $_POST['data_rozpoczecia'];
        $status = $_POST['status'];
        $odpowiedzialny = $_POST['odpowiedzialny'];

        $sql = "UPDATE projekty SET nazwa = :nazwa, opis = :opis, data_rozpoczecia = :data_rozpoczecia, status = :status, odpowiedzialny = :odpowiedzialny WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nazwa' => $nazwa,
            'opis' => $opis,
            'data_rozpoczecia' => $data_rozpoczecia,
            'status' => $status,
            'odpowiedzialny' => $odpowiedzialny,
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

if ($action == 'delete' && $id) {
    $sql = "DELETE FROM projekty WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    header("Location: index.php");
    exit;
}

// Pobieranie frazy wyszukiwania z formularza
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = trim($search);

// Pobieranie wszystkich projektów (z uwzględnieniem wyszukiwania)
$sql = $search ? "SELECT * FROM projekty WHERE nazwa LIKE :search" : "SELECT * FROM projekty";
$stmt = $pdo->prepare($sql);
$stmt->execute($search ? ['search' => "%$search%"] : []);
$projekty = $stmt->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign('projekty', $projekty);
$smarty->assign('search', $search);
$smarty->display('projekty.tpl');

if ($action == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    $data_rozpoczecia = $_POST['data_rozpoczecia'];
    $status = $_POST['status'];
    $odpowiedzialny = $_POST['odpowiedzialny'];

    $sql = "INSERT INTO projekty (nazwa, opis, data_rozpoczecia, status, odpowiedzialny) VALUES (:nazwa, :opis, :data_rozpoczecia, :status, :odpowiedzialny)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nazwa' => $nazwa,
        'opis' => $opis,
        'data_rozpoczecia' => $data_rozpoczecia,
        'status' => $status,
        'odpowiedzialny' => $odpowiedzialny,
    ]);

    header('Location: index.php');
    exit;
}

if ($action == 'add') {
    $smarty->display('add.tpl');
}
ob_end_flush();
?>
