<?php
require 'database-conn.php';

$query = "SELECT * FROM login WHERE id = '1'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

foreach ($row as $user) {
    $user = $row['user'];
}

if ($user == 'admin') {
    require '(Admin)nav-bar.html.php';
} else if ($user == 'secretary') {
    require '(Staff)nav-bar.html.php';
} else if ($user == 'veterinarian') {
    require '(Vet)nav-bar.html.php';
}
mysqli_close($conn);
