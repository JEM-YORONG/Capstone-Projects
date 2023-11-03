<?php
require 'database-conn.php';

$search = $_GET['search2'];

// Set the timezone to 'Asia/Manila'
date_default_timezone_set('Asia/Manila');

// Get the current date in the same format as your database date
$currentDate = date('Y-m-d');

$query = "SELECT * FROM schedule WHERE date > '$currentDate'";

// If search input is not empty
if (!empty($search)) {
    $query .= " AND (ownername LIKE '%$search%' OR petname LIKE '%$search%' OR type LIKE '%$search%' OR service LIKE '%$search%' OR date LIKE '%$search%' OR number LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);

// Check if there are any rows returned by the query
if (mysqli_num_rows($result) > 0) {
    // Array to store the results
    $sortedResults = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $sortedResults[] = $row;
    }

    // Check if there are any matching results
    if (!empty($sortedResults)) {
        // Define a custom sorting function based on the "date" column
        function sortByDate($a, $b)
        {
            return strtotime($a['date']) - strtotime($b['date']);
        }

        // Sort the array by date in ascending order
        usort($sortedResults, 'sortByDate');

        foreach ($sortedResults as $row) :
?>
            <div class="table-body">
                <tr>
                    <td data-label="Notify" onclick="setMessageUpcoming('<?php echo $row['ownername']; ?>',
                    '<?php echo $row['date']; ?>',
                    '<?php echo $row['petname']; ?>',
                    '<?php echo $row['petname2']; ?>',
                    '<?php echo $row['petname3']; ?>',
                    '<?php echo $row['petname4']; ?>',
                    '<?php echo $row['petname5']; ?>',
                    '<?php echo $row['service']; ?>',
                    '<?php echo $row['service2']; ?>',
                    '<?php echo $row['service3']; ?>');"><button type="button" class="notify-button-1" onclick="opensms(); infoSMS('<?php echo $row['date']; ?>', '<?php echo $row['number']; ?>', '<?php echo $row['ownername']; ?>', '<?php echo $row['petname']; ?>');"><span class="material-symbols-outlined">reminder</span></button></td>
                    <td><?php echo $row['date']; ?></td>
                    <td data-label="Owner Name"><?php echo $row['ownername']; ?></td>

                    <td>
                        <button onclick="openFormDetails('<?php echo $row['ownername']; ?>', '<?php echo $row['id']; ?>'); submitID('id');">
                            Details
                        </button>
                        <?php require 'script files\getDetailsID.js.php'; ?>
                    </td>

                    <td> <button type="button" class="edit-button" onclick="openUpdateForm(); 
                    getRowId('<?php echo $row['id']; ?>',
                    '<?php echo $row['date']; ?>',
                    '<?php echo $row['ownername']; ?>',
                    '<?php echo $row['petname']; ?>',
                    '<?php echo $row['petname2']; ?>',
                    '<?php echo $row['petname3']; ?>',
                    '<?php echo $row['petname4']; ?>',
                    '<?php echo $row['petname5']; ?>',
                    '<?php echo $row['service']; ?>',
                    '<?php echo $row['service2']; ?>',
                    '<?php echo $row['service3']; ?>',
                    '<?php echo $row['number']; ?>');"><span class="material-symbols-outlined">edit</span></button></td>

                    <td> <button type="button" class="delete-button" onclick="openFormDelete(); deleteRow('<?php echo $row['id']; ?>');"><span class="material-symbols-outlined">delete</span></button></td>
                </tr>
            </div>
<?php
        endforeach;
    } else {
        // No results found 
        echo "No results found.";
    }
} else {
    // No results found 
}
?>