<?php
define('MYSQL_HOST', 'mysql');
define('MYSQL_USER', $_ENV['MYSQL_USER']);
define('MYSQL_PASSWORD', $_ENV['MYSQL_PASSWORD']);
define('MYSQL_DB', $_ENV['MYSQL_DATABASE']);

$conn = new PDO('mysql:host='.MYSQL_HOST.';port=3306;dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);

$hotel_id = $_GET['hotel_id'] ?? 1; // отель для которого делаем проверку

echo '<ul>';
foreach ($conn->query('SELECT * FROM `agencies`') as $row) {
    echo '<li><strong>'.$row['id'].'</strong> '.$row['name'].'</li>';
}
echo '</ul>';
?>