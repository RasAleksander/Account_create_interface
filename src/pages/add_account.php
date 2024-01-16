<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Account</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Подключение стилей -->
</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4">Add Account</h1>

        <!-- Форма для добавления нового аккаунта -->
        <form action="process_add_account.php" method="post">
            <!-- Поля для ввода данных аккаунта -->
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name">

            <label for="position">Position:</label>
            <input type="text" id="position" name="position">

            <label for="phone1">Phone 1:</label>
            <input type="tel" id="phone1" name="phone1">

            <label for="phone2">Phone 2:</label>
            <input type="tel" id="phone2" name="phone2">

            <label for="phone3">Phone 3:</label>
            <input type="tel" id="phone3" name="phone3">

            <!-- Кнопка для отправки формы -->
            <button type="submit" class="btn btn-primary">Add Account</button>
        </form>

        <!-- Ссылка для возврата к списку аккаунтов -->
        <a href="index.php" class="btn btn-secondary mt-3">Back to Account List</a>
    </div>

</body>

</html>
