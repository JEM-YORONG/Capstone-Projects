<?php
session_start();
require 'database-conn.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$query = "SELECT * FROM customer";
// If search input is not empty, add a WHERE clause to filter the data
if (!empty($search)) {
    $query .= " WHERE custId LIKE '%$search%' OR lastname LIKE '%$search%' OR firstname LIKE '%$search%' OR contact LIKE '%$search%' OR email LIKE '%$search%' OR address LIKE '%$search%'";
}
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr id="<?php echo $row["id"]; ?>">
        <td><?php echo $row["custId"]; ?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        <td><?php echo $row["contact"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["address"]; ?></td>
        <td>
            <a href="customer-and-pet-records.php?custId=<?php echo $row["id"]; ?>">
                <button type="button" class="view-button" style="    background-color: #00000000;
  border-style: none;
  color: #5a81fa;
  cursor: pointer;">
                    <span class="material-symbols-outlined">toc</span>
                </button>
            </a>
            <button type="button" class="delete-button" onclick="openFormDelete(); deleteId('<?php echo $row['id']; ?>');">
                <span class="material-symbols-outlined">delete</span>
            </button>
        </td>
    </tr>
<?php endwhile; ?>