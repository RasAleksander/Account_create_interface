-- Создаем базу данных, если она не существует
CREATE DATABASE IF NOT EXISTS Zimalab_test;

-- Используем созданную базу данных
USE Zimalab_test;

-- Создаем таблицу аккаунтов, если она не существует
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    company_name VARCHAR(100),
    position VARCHAR(100),
    phone1 VARCHAR(20),
    phone2 VARCHAR(20),
    phone3 VARCHAR(20)
);

-- Добавляем 20 случайных аккаунтов
DELIMITER //

CREATE PROCEDURE AddRandomAccounts()
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= 20 DO
        INSERT INTO accounts (first_name, last_name, email, company_name, position, phone1, phone2, phone3)
        VALUES (
            CONCAT('First', i),
            CONCAT('Last', i),
            CONCAT('email', i, '@example.com'),
            CONCAT('Company', i),
            CONCAT('Position', i),
            CONCAT('Phone1-', i),
            CONCAT('Phone2-', i),
            CONCAT('Phone3-', i)
        );
        SET i = i + 1;
    END WHILE;
END //

DELIMITER ;

-- Вызываем процедуру для добавления 20 случайных аккаунтов
CALL AddRandomAccounts();