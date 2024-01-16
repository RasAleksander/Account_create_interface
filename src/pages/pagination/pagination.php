<?php
// Параметры пагинации
$totalPages = ceil($totalAccounts / $accountsPerPage);

// Определяем пределы для отображаемых страниц
$visiblePages = 5; // Количество отображаемых страниц
$halfVisiblePages = floor($visiblePages / 2);
$startPage = max(1, min($currentPage - $halfVisiblePages, $totalPages - $visiblePages + 1));
$endPage = min($totalPages, $startPage + $visiblePages - 1);

// Выводим стрелку "назад" и ссылку на первую страницу
if ($currentPage > 1) {
    echo '<a href="?page=1" class="pagination-link">&laquo; First</a>';
    echo '<a href="?page=' . ($currentPage - 1) . '" class="pagination-link">&lsaquo; Previous</a>';
}

// Выводим видимые страницы
for ($page = $startPage; $page <= $endPage; $page++) {
    if ($page == $currentPage) {
        echo '<span class="pagination-current">' . $page . '</span>';
    } else {
        echo '<a href="?page=' . $page . '" class="pagination-link">' . $page . '</a>';
    }
}

// Выводим стрелку "вперед" и ссылку на последнюю страницу
if ($currentPage < $totalPages) {
    echo '<a href="?page=' . ($currentPage + 1) . '" class="pagination-link">Next &rsaquo;</a>';
    echo '<a href="?page=' . $totalPages . '" class="pagination-link">Last &raquo;</a>';
}

?>