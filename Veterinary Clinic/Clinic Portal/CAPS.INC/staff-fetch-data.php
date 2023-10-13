<?php
require 'database-conn.php';

$search = $_GET['search'];

$query = "SELECT * FROM staffs";

// If search input is not empty, add a WHERE clause to filter the data
if (!empty($search)) {
    $query .= " WHERE cliniId LIKE '%$search%' OR name LIKE '%$search%' OR role LIKE '%$search%' OR contact LIKE '%$search%' OR email LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr id="<?php echo $row["id"]; ?>">
        <td><?php echo $row["cliniId"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["role"]; ?></td>
        <td><?php echo $row["contact"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><input type="password" value="<?php echo $row["password"]; ?>" style="
        border: none; text-align: center; font-size: medium; background-color: transparent;" disabled></td>
        <td>
            <button type="button" class="edit-button" onclick="
            openFormEdit(); 
            getRowID(
                '<?php echo $row['cliniId']; ?>',
                '<?php echo $row['name']; ?>',
                '<?php echo $row['role']; ?>',
                '<?php echo $row['contact']; ?>',
                '<?php echo $row['email']; ?>',
                '<?php echo $row['password']; ?>'
            );">
                <span class="material-symbols-outlined">edit</span>
            </button>
        </td>
        <td>
            <button type="button" class="delete-button" onclick="openFormDelete(); deleteId('<?php echo $row['cliniId']; ?>');">
                <span class="material-symbols-outlined">delete</span>
            </button>
        </td>
    </tr>
<?php endwhile; ?>