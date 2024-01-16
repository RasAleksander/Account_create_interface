<?php
require_once '../classes/Account.php';

// Получение id аккаунта из параметра запроса
$accountId = isset($_GET['id']) ? $_GET['id'] : null;

// Если id не передан, перенаправляем на страницу со списком аккаунтов
if (!$accountId) {
    header('Location: index.php');
    exit();
}

// Создаем объект аккаунта и вызываем метод для удаления аккаунта
$account = new Account();
$account->deleteAccount($accountId);

// Перенаправление на страницу с обновленным списком аккаунтов
header('Location: index.php');
exit();
?>
