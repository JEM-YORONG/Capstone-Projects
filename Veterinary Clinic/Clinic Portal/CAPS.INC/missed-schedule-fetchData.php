<?php
require 'database-conn.php';

$search = $_GET['search'];

$query = "SELECT * FROM schedule WHERE status NOT IN ('Done', 'Upcoming')";

// If search input is not empty, add a WHERE clause to filter the data
if (!empty($search)) {
    $query .= " AND (ownername LIKE '%$search%' OR petname LIKE '%$search%' OR type LIKE '%$search%' OR service LIKE '%$search%' OR date LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr>
        <td><?php echo $row["date"]; ?></td>
        <td data-label="Owner Name"><?php echo $row["ownername"]; ?></td>
        <td data-label="Pet Name"><?php echo $row["petname"]; ?></td>
        <td data-label="Service"><?php echo $row["service"]; ?></td>
        <td>
            <button type="button" class="edit-button" onclick="openForm(
                '',
                '<?php echo $row['ownername']; ?>',
                '<?php echo $row['petname']; ?>',
                '<?php echo $row['service']; ?>',
                '<?php echo $row['number']; ?>');">
                <span class="material-symbols-outlined">edit</span>
            </button>
        </td>
        <td>
            <button type="button" class="delete-button" onclick="openFormDelete(); deleteRow('<?php echo $row['id']; ?>');">
                <span class="material-symbols-outlined">delete</span>
            </button>
        </td>
    </tr>
<?php endwhile; ?>