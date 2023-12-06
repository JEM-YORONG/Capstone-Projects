<?php
require 'database-conn.php';

$query = "SELECT * FROM customer";

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