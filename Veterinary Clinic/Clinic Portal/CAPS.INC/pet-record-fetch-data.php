<?php
require 'database-conn.php';

$search = $_GET['searchInput'];
$idOwner = $_GET['id'];
$petname = $_GET['Petname'];

$query = "SELECT * FROM petrecord WHERE ownerid = '$idOwner' AND petname = '$petname'";

// If search input is not empty and not 'all', add a WHERE clause to filter the data
if (!empty($search) && $search != 'all') {
    $query .= " AND (date LIKE '%$search%' OR service1 LIKE '%$search%' OR service2 LIKE '%$search%' OR service3 LIKE '%$search%' OR weight LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) :
    $servicesArray = array($row['service1'], $row['service2'], $row['service3']);
    $serviceStringDone = implode(', ', array_filter($servicesArray));
?>

    <tr>
        <td data-label=""><?php echo $row["date"]; ?></td>
        <td data-label=""><?php echo $serviceStringDone; ?></td>
        <td data-label=""><?php echo $row["about"]; ?></td>
        <td class="pet-rec" onclick="openViewRecords(
            '<?php echo $row['date']; ?>',
            '<?php echo $row['service1']; ?>',
            '<?php echo $row['service2']; ?>',
            '<?php echo $row['service3']; ?>',
            '<?php echo $row['vaccine1']; ?>',
            '<?php echo $row['vaccine2']; ?>',
            '<?php echo $row['vaccine3']; ?>',
            '<?php echo $row['weight']; ?>',
            '<?php echo $row['about']; ?>',
            '<?php echo $row['note']; ?>'
        )">
            <span class="material-symbols-outlined"> toc </span>
        </td>

        <?php
        $query = "SELECT * FROM login WHERE id = '1'";
        $resultLogin = mysqli_query($conn, $query);
        $rowLogin = mysqli_fetch_array($resultLogin);

        $user = $rowLogin['user'];

        if ($user == 'admin' || $user == 'veterinarian') :
        ?>
            <td>
                <button type="button" class="done-button" style="background-color: #00000000;
                    border-style: none;
                    color: #5a81fa;
                    cursor: pointer;" onclick="openEditRecord(
                        '<?php echo $row['nid']; ?>',
                        '<?php echo $row['date']; ?>',
                        '<?php echo $row['service1']; ?>',
                        '<?php echo $row['service2']; ?>',
                        '<?php echo $row['service3']; ?>',
                        '<?php echo $row['vaccine1']; ?>',
                        '<?php echo $row['vaccine2']; ?>',
                        '<?php echo $row['vaccine3']; ?>',
                        '<?php echo $row['weight']; ?>',
                        '<?php echo $row['about']; ?>',
                        '<?php echo $row['note']; ?>',
                        '<?php
                            $nid = $row['nid'];
                            $query2 = 'SELECT * FROM schedule WHERE nid = ' . $nid;
                            $result2 = mysqli_query($conn, $query2);
                            if ($result2 && mysqli_num_rows($result2) > 0) {
                                $row2 = mysqli_fetch_assoc($result2);
                                echo $row2['date'];
                            }
                            ?>'
                    );">
                    <span class="material-symbols-outlined"> edit </span>
                </button>
            </td>
            <td>
                <button type="button" class="done-button" style="background-color: #00000000;
                    border-style: none;
                    color: #f50d05;
                    cursor: pointer;" onclick="submitData('delete2'); deletePet2('<?php echo $row['nid']; ?>');">
                    <span class="material-symbols-outlined"> delete </span>
                </button>
                <?php require 'script files/customer-pet-record-data.js.php'; ?>
            </td>
        <?php endif; ?>
    </tr>

<?php endwhile; ?>