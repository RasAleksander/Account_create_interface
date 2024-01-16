<?php
require_once '../classes/Account.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $newAccount = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'company_name' => $_POST['company_name'],
        'position' => $_POST['position'],
        'phone1' => $_POST['phone1'],
        'phone2' => $_POST['phone2'],
        'phone3' => $_POST['phone3'],
    ];

    // Создание объекта аккаунта
    $account = new Account();
    $emailUnique = $account->isEmailUnique($newAccount['email']);

    // Проверка на уникальность
    if ($emailUnique) {
        $account->addAccount($newAccount);
        header('Location: index.php');
        exit();
    } else {
        echo "Error: Email is not unique!";
        exit();
    }
}

?>
