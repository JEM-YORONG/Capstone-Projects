<?php
require 'database-conn.php';
require 'schedule-checker.php';

statusChecker();

$search = $_GET['search1'];

// Set the timezone to 'Asia/Manila'
date_default_timezone_set('Asia/Manila');

$query = "SELECT * FROM schedule WHERE status != 'Done'";

// If search input is not empty
if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    $query .= " AND (ownername LIKE '%$search%' OR petname LIKE '%$search%' OR type LIKE '%$search%' OR service LIKE '%$search%' OR date LIKE '%$search%' OR number LIKE '%$search%')";
}

$result = mysqli_query($conn, $query);

// Check if there are any rows returned by the query
if ($result) {
    // Array to store the results
    $sortedResults = [];

    // Get the current date in the same format as your database date
    $currentDate = date('Y-m-d');

    while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['date'];

        // Compare the date from the database with the current date
        if ($date == $currentDate) {
            $sortedResults[] = $row;
        }
    }

    // Check if there are any matching results
    if (!empty($sortedResults)) {
        foreach ($sortedResults as $row) :
?>
            <div class="table-body">
                <tr>
                    <!-- <td>
                        <button type="button" class="done-button" style=" background-color: #00000000;
                            border-style: none;
                            color: #5a81fa;
                            cursor: pointer;">
                            <a href="customer-and-pet-records.php?custId=<?php //echo $row["ownerid"]; 
                                                                            ?>">
                                <span class="material-symbols-outlined">
                                    mouse
                                </span>
                            </a>
                        </button>
                    </td> -->
                    <?php require 'script files\schedule.data.js.php'; ?>
                    <td data-label="Notify" onclick="setMessageToday('<?php echo $row['ownername']; ?>',
                    '<?php echo $row['date']; ?>',
                    '<?php echo $row['petname']; ?>',
                    '<?php echo $row['service']; ?>');"><button type="button" class="notify-button-1" style="background-color: #00000000; border-style: none; color: #5a81fa; cursor: pointer;" onclick="opensms(); infoSMS('<?php echo $row['date']; ?>', '<?php echo $row['number']; ?>', '<?php echo $row['ownername']; ?>', '<?php echo $row['petname']; ?>');">
                            <span class="material-symbols-outlined">
                                sms
                            </span>
                        </button></td>
                    <td><?php echo $row['date']; ?></td>
                    <td data-label="Owner Name"><?php echo $row['ownername']; ?></td>
                </tr>
            </div>
<?php
        endforeach;
    } else {
        // No results found
        echo "No results found.";
    }
} else {
    // Error in the query
    echo "Error: " . mysqli_error($conn);
}
?>