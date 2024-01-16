-- Создание таблицы для аккаунтов
CREATE TABLE accounts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    company_name VARCHAR(100),
    position VARCHAR(50),
    phone1 VARCHAR(15),
    phone2 VARCHAR(15),
    phone3 VARCHAR(15)
);

-- Добавление индекса для улучшения производительности поиска по email
CREATE INDEX idx_email ON accounts (email);
