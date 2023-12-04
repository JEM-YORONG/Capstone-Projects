<?php
require 'database-conn.php';
require 'schedule-checker.php';

statusChecker();

// Set the timezone to 'Asia/Manila'
date_default_timezone_set('Asia/Manila');

$query = "SELECT * FROM schedule WHERE status != 'Done'";

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

    // Number of records per page
    $recordsPerPage = 10;

    // Get the total number of records
    $totalRecords = count($sortedResults);

    // Calculate the total number of pages
    $totalPages = ceil($totalRecords / $recordsPerPage);

    // Get the current page number from the query string
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the SQL query
    $offset = ($page - 1) * $recordsPerPage;

    // Fetch records for the current page
    $currentPageResults = array_slice($sortedResults, $offset, $recordsPerPage);

    // Display the results for the current page
    if (!empty($currentPageResults)) {
        foreach ($currentPageResults as $row) :
?>
            <div class="table-body">

                <?php require 'schedule.data.js.php'; ?>
                <td data-label="Notify" onclick="
    setMessageToday(
        '<?php echo $row['ownername']; ?>',
        '<?php echo $row['date']; ?>',
        '<?php echo $row['petname']; ?>',
        '<?php echo $row['petname2']; ?>',
        '<?php echo $row['petname3']; ?>',
        '<?php echo $row['petname4']; ?>',
        '<?php echo $row['petname5']; ?>',
        '<?php echo $row['service']; ?>',
        '<?php echo $row['service2']; ?>',
        '<?php echo $row['service3']; ?>'
        );"><button type="button" class="notify-button-1" style="background-color: #00000000; border-style: none; color: #5a81fa; cursor: pointer;" onclick="opensms(); infoSMS('<?php echo $row['date']; ?>', '<?php echo $row['number']; ?>', '<?php echo $row['ownername']; ?>', '<?php echo $row['petname']; ?>');">
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
        // No results found for the current page
        echo "No results found.";
    }
} else {
    // Error in the query
    echo "Error: " . mysqli_error($conn);
}
?>