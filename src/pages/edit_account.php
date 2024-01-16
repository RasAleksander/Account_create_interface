<?php
require_once '../classes/Account.php';

// Получение id аккаунта из параметра запроса
$accountId = isset($_GET['id']) ? $_GET['id'] : null;

// Если id не передан, перенаправляем на страницу со списком аккаунтов
if (!$accountId) {
    header('Location: index.php');
    exit();
}

// Создаем объект аккаунта и получаем данные для редактирования
$account = new Account();
$accountData = $account->getAccountById($accountId);

// Если аккаунт не найден, перенаправляем на страницу со списком аккаунтов
if (!$accountData) {
    header('Location: index.php');
    exit();
}

// Обработка формы редактирования
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedAccount = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'company_name' => $_POST['company_name'],
        'position' => $_POST['position'],
        'phone1' => $_POST['phone1'],
        'phone2' => $_POST['phone2'],
        'phone3' => $_POST['phone3'],
    ];

    // Вызываем метод для обновления данных аккаунта
    $account->updateAccount($accountId, $updatedAccount);

    // Перенаправление на страницу с обновленным списком аккаунтов
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Edit Account</h1>
        <form action="" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $accountData['first_name']; ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $accountData['last_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $accountData['email']; ?>" required>

            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" value="<?php echo $accountData['company_name']; ?>">

            <label for="position">Position:</label>
            <input type="text" id="position" name="position" value="<?php echo $accountData['position']; ?>" >

            <label for="phone1">Phone 1:</label>
            <input type="tel" id="phone1" name="phone1" value="<?php echo $accountData['phone1']; ?>" >

            <label for="phone2">Phone 2:</label>
            <input type="tel" id="phone2" name="phone2" value="<?php echo $accountData['phone2']; ?>">

            <label for="phone3">Phone 3:</label>
            <input type="tel" id="phone3" name="phone3" value="<?php echo $accountData['phone3']; ?>">

            <button type="submit" class="btn btn-primary">Update Account</button>
        </form>

        <a href="index.php" class="btn btn-secondary mt-3">Back to Account List</a>
    </div>

</body>

</html>
