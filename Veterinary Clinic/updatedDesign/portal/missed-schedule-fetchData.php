<?php
require 'database-conn.php';

$query = "SELECT * FROM schedule WHERE status NOT IN ('Done', 'Upcoming', 'Past')";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
?>
    <tr>
        <td><?php echo $row["date"]; ?></td>
        <td data-label="Owner Name"><?php echo $row["ownername"]; ?></td>
        <td data-label="Pet Name">
            <?php echo $row["petname"]; ?><br>
            <?php echo $row["petname2"]; ?><br>
            <?php echo $row["petname3"]; ?><br>
            <?php echo $row["petname4"]; ?><br>
            <?php echo $row["petname5"]; ?>
        </td>
        <td data-label="Service">
            <?php echo $row["service"]; ?><br>
            <?php echo $row["service2"]; ?><br>
            <?php echo $row["service3"]; ?>
        </td>
        <td>
            <button type="button" class="edit-button" onclick="openForm(
                '',
                '<?php echo $row['ownername']; ?>',
                '<?php echo $row['petname']; ?>',
                '<?php echo $row['service']; ?>',
                '<?php echo $row['number']; ?>',
                '<?php echo $row['id']; ?>');">
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