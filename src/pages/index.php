<?php
require_once '../classes/Account.php';

// Количество выводимых аккаунтов для пагинации
$accountsPerPage = 10;

$account = new Account();
$accounts = $account->getAllAccounts();

// Получение текущей страницы из параметра запроса
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Определение диапазона отображаемых аккаунтов
$startIndex = ($currentPage - 1) * $accountsPerPage;
$endIndex = $startIndex + $accountsPerPage - 1;

// Фильтрация аккаунтов в соответствии с диапазоном
$displayedAccounts = array_slice($accounts, $startIndex, $accountsPerPage);



// Количество выводимых страниц для пагинации
$totalAccounts = count($accounts);
$totalPages = ceil($totalAccounts / $accountsPerPage);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management System</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Account List</h1>
        <div class="account-list">
            <?php foreach ($displayedAccounts as $account): ?>
                <div class="account-item">
                    <div class="account-info">
                    <h3 class="account-name"><?php echo $account['first_name'] . ' ' . $account['last_name']; ?></h3>
                    <p class="account-email"><?php echo $account['email']; ?></p>
                    <p class="account-company"><?php echo 'Company: ' . $account['company_name']; ?></p>
                    <p class="account-position"><?php echo 'Position: ' . $account['position']; ?></p>
                    <p class="account-phone"><?php echo 'Phones: ' . $account['phone1'] . ', ' . $account['phone2'] . ', ' . $account['phone3']; ?></p>
                    </div>
                    <div class="account-actions">
                        <a href="edit_account.php?id=<?php echo $account['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="delete_account.php?id=<?php echo $account['id']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Пагинация -->
        <div class="pagination-container">
            <?php if ($totalPages > 1) { include 'pagination/pagination.php'; } ?>
            <a href="add_account.php" class="btn btn-success mt-3">Add New Account</a>
        </div>
        
    </div>

</body>

</html>
