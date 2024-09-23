-- Tworzenie bazy danych
CREATE DATABASE IF NOT EXISTS projekty_firma;

-- Używanie bazy danych
USE projekty_firma;

-- Tworzenie tabeli projekty
CREATE TABLE IF NOT EXISTS projekty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(255) NOT NULL,
    opis TEXT NOT NULL,
    data_rozpoczecia DATE NOT NULL,
    data_zakonczenia DATE DEFAULT NULL,
    status ENUM('zakończony', 'w trakcie') NOT NULL
);

-- Wstawienie przykładowych danych
INSERT INTO projekty (nazwa, opis, data_rozpoczecia, data_zakonczenia, status) VALUES
('Projekt A', 'Opis projekt A', '2023-01-10', '2023-03-10', 'zakończony'),
('Projekt B', 'Opis projektu B', '2023-02-15', NULL, 'w trakcie'),
('Projekt C', 'Opis projektu C', '2023-03-20', '2023-06-15', 'zakończony');
