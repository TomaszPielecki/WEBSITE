<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj projekt</title>
</head>
<body>
    <h1>Edytuj projekt</h1>
    <form method="POST" action="index.php?action=edit&id={$projekt.id}">
        <label for="nazwa">Nazwa projektu:</label>
        <input type="text" id="nazwa" name="nazwa" value="{$projekt.nazwa}" required><br>

        <label for="opis">Opis:</label>
        <textarea id="opis" name="opis" required>{$projekt.opis}</textarea><br>

        <label for="data_rozpoczecia">Data rozpoczęcia:</label>
        <input type="date" id="data_rozpoczecia" name="data_rozpoczecia" value="{$projekt.data_rozpoczecia}" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="zakończony" {$projekt.status == 'zakończony' ? 'selected' : ''}>Zakończony</option>
            <option value="w trakcie" {$projekt.status == 'w trakcie' ? 'selected' : ''}>W trakcie</option>
        </select><br>

        <button type="submit" name="submit">Zapisz zmiany</button>
    </form>
</body>
</html>
