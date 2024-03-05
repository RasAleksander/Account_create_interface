<?php
class Database
{
    private $host = "localhost";
    private $dbname = "Account_base";
    private $username = "root";
    private $password = '$sudo';
    private $conn;

    // Метод для установления соединения с базой данных
    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Метод для подготовки запроса
    public function prepare($sql)
    {
        // Проверяем, есть ли активное соединение
        if ($this->conn) {
            return $this->conn->prepare($sql);
        } else {
            die("No active connection."); // Если соединение отсутствует, завершаем выполнение с ошибкой
        }
    }
}
?>
