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
        <input type="text" id="search" name="search" value="{$search|escape}" placeholder="Wpisz nazwę projektu">
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
        {foreach from=$projekty item=projekt}
        <tr>
            <td>{$projekt.nazwa}</td>
            <td>{$projekt.opis}</td>
            <td>{$projekt.data_rozpoczecia}</td>
            <td>{if $projekt.data_zakonczenia}{$projekt.data_zakonczenia}{else}W trakcie{/if}</td>
            <td>{$projekt.status}</td>
            <td>{$projekt.odpowiedzialny}</td>
            <td>
                {assign var="data_rozpoczecia" value=$projekt.data_rozpoczecia}
                {assign var="aktualna_data" value="now"|date_format:"%Y-%m-%d"}
                {assign var="roznica" value=(strtotime($aktualna_data) - strtotime($data_rozpoczecia)) / (60 * 60 * 24)}
                {if $roznica >= 0}
                    {$roznica} dni
                {else}
                    "Niedawno rozpoczęty"
                {/if}
            </td>
            <td>
                <a href="index.php?action=edit&id={$projekt.id}">Edytuj</a>
                <a href="index.php?action=delete&id={$projekt.id}" onclick="return confirm('Czy na pewno chcesz usunąć ten projekt?')">Usuń</a>
            </td>
        </tr>
        {/foreach}
    </table>
</body>
</html>
