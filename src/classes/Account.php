<?php
require_once 'Database.php';

class Account
{
    private $db;

    // Конструктор класса
    public function __construct()
    {
        $this->db = new Database();
    }

    // Получение всех аккаунтов
    public function getAllAccounts()
    {
        $pdo = $this->db->connect();
        $stmt = $pdo->query("SELECT * FROM accounts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Проверка уникальности email
    public function isEmailUnique($email)
    {
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('SELECT COUNT(*) FROM accounts WHERE email = :email');
            $query->bindParam(':email', $email);
            $query->execute();
            $count = $query->fetchColumn();
            return $count == 0;
        } catch (PDOException $e) {
            die("Error checking email uniqueness: " . $e->getMessage());
        }
    }

    // Добавление нового аккаунта
    public function addAccount($accountData)
    {
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('INSERT INTO accounts (first_name, last_name, email, company_name, position, phone1, phone2, phone3) VALUES (:first_name, :last_name, :email, :company_name, :position, :phone1, :phone2, :phone3)');

            // Привязка параметров
            $query->bindParam(':first_name', $accountData['first_name']);
            $query->bindParam(':last_name', $accountData['last_name']);
            $query->bindParam(':email', $accountData['email']);
            $query->bindParam(':company_name', $accountData['company_name']);
            $query->bindParam(':position', $accountData['position']);
            $query->bindParam(':phone1', $accountData['phone1']);
            $query->bindParam(':phone2', $accountData['phone2']);
            $query->bindParam(':phone3', $accountData['phone3']);

            // Выполнение запроса
            $query->execute();
        } catch (PDOException $e) {
            die("Error adding account: " . $e->getMessage());
        }
    }

    // Получение аккаунта по ID
    public function getAccountById($id)
    {
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('SELECT * FROM accounts WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error getting account by ID: " . $e->getMessage());
        }
    }

    // Обновление данных аккаунта
    public function updateAccount($id, $data)
    {
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('UPDATE accounts SET first_name = :first_name, last_name = :last_name, email = :email, company_name = :company_name, position = :position, phone1 = :phone1, phone2 = :phone2, phone3 = :phone3 WHERE id = :id');

            $query->bindParam(':id', $id);
            $query->bindParam(':first_name', $data['first_name']);
            $query->bindParam(':last_name', $data['last_name']);
            $query->bindParam(':email', $data['email']);
            $query->bindParam(':company_name', $data['company_name']);
            $query->bindParam(':position', $data['position']);
            $query->bindParam(':phone1', $data['phone1']);
            $query->bindParam(':phone2', $data['phone2']);
            $query->bindParam(':phone3', $data['phone3']);

            $query->execute();
        } catch (PDOException $e) {
            die("Error updating account: " . $e->getMessage());
        }
    }

    // Удаление аккаунта по ID
    public function deleteAccount($id)
    {
        $pdo = $this->db->connect();

        try {
            $query = $pdo->prepare('DELETE FROM accounts WHERE id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
        } catch (PDOException $e) {
            die("Error deleting account: " . $e->getMessage());
        }
    }
}
?>
