<?php
require 'database-conn.php';

$query = "SELECT * FROM aboutus WHERE id = '1'";
$result1 = mysqli_query($conn, $query);
$row1 = mysqli_fetch_assoc($result1);

$title = $row1['title'];

?>
<a><?php echo $title; ?></a>