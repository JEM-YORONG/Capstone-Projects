<?php
require 'database-conn.php';

$query = "SELECT * FROM serviceandproduct";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr id="<?php echo $row["id"]; ?>">
        <td><?php echo $row["id"]; ?></td>
        <td><img src="tempImage/<?php echo $row["image"]; ?>" alt="" width="300" height="200" style="object-fit: cover;"></td>
        <td><?php echo $row["title"]; ?></td>
        <td><?php echo $row["categories"]; ?></td>
        <td><?php echo $row["description"]; ?></td>        
    </tr>
<?php endwhile; ?>