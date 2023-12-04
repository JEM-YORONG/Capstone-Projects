<?php
session_start();
require 'database-conn.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$query = "SELECT * FROM pet";
// If search input is not empty, add a WHERE clause to filter the data
if (!empty($search)) {
    $query .= " WHERE petname LIKE ? OR ownerfirstname LIKE ? OR ownerlastname LIKE ? OR ownercontact LIKE ? OR owneraddress LIKE ? OR birthdate LIKE ? OR type LIKE ? OR breed LIKE ? OR species LIKE ? OR gender LIKE ?";
}

$stmt = mysqli_prepare($conn, $query);

if (!empty($search)) {
    $searchParam = "%$search%";
    mysqli_stmt_bind_param($stmt, "ssssssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$row = mysqli_fetch_assoc($result);

while ($row) :
?>
    <tr id="<?php echo $row["id"]; ?>">
        <td><?php echo $row["petname"]; ?></td>
        <td><?php echo $row["ownerfirstname"]. " ". $row["ownerlastname"]; ?></td>
        <td><?php echo $row["ownercontact"]; ?></td>
        <td><?php echo $row["birthdate"]; ?></td>
        <td><?php echo $row["breed"]; ?></td>
        <td><?php echo $row["species"]; ?></td>
        <td><?php echo $row["gender"]; ?></td>
        <td>
            <a href="customer-and-pet-records.php?petId=<?php echo $row["id"]; ?>">
                <button type="button" class="view-button">
                    <span class="material-symbols-outlined">toc</span>
                </button>
            </a>
        </td>
    </tr>
<?php
    $row = mysqli_fetch_assoc($result);
endwhile;
?>