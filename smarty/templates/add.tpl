<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj nowy projekt</title>
</head>
<body>
    <h1>Dodaj nowy projekt</h1>
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

        <button type="submit">Dodaj projekt</button>
    </form>
</body>
</html>
