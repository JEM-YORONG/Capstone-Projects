<?php
require 'database-conn.php';
//require 'inventory-stock-checker.php';

$search = $_GET['search'];

$query = "SELECT * FROM inventory";

// If search input is not empty, add a WHERE clause to filter the data
if (!empty($search)) {
    $query .= " WHERE productId LIKE '%$search%' OR name LIKE '%$search%' OR type LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr id="<?php echo $row["id"]; ?>">
        <td><?php echo $row["productId"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["maxquantity"]; ?></td>
        <?php
        require 'database-conn.php';
        $totalQuantity = intval($row["maxquantity"]);
        $maxquantity = intval($row["maxquantity"]);
        $minquantity = intval($row["minquantity"]);

        $statusHigh = "<td class='h-status'>High Stock</td>";
        $statusLow = "<td class='l-status'>Low Stock</td>";
        $statusNoStock = "<td class='n-status'>No Stock</td>";

        $status = "";

        if ($totalQuantity < $minquantity && $totalQuantity != 0) {
            $status = $statusLow;
            echo $status;
        } else if ($totalQuantity >= $minquantity) {
            $status = $statusHigh;
            echo $status;
        } else {
            $status = $statusNoStock;
            echo $status;
        }
        ?>
        <td><?php echo $row["type"]; ?></td>
        <td>
            <button type="button" class="edit-button" onclick="
            openFormEdit();
            getRowID(
                '<?php echo $row['productId']; ?>',
                '<?php echo $row['name']; ?>',
                '<?php echo $row['maxquantity']; ?>',
                '<?php echo $row['minquantity']; ?>',
                '<?php echo $row['type']; ?>'
            );">
                <span class="material-symbols-outlined">Edit</span>
            </button>
        </td>
        <td>
            <button type="button" class="delete-button" onclick="openFormDelete(); deleteId('<?php echo $row['productId']; ?>');">
                <span class="material-symbols-outlined">Delete</span>
            </button>
        </td>
    </tr>
<?php endwhile; ?>