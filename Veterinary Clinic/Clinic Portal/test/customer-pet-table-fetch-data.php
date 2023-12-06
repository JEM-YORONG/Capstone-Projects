<?php
require 'database-conn.php';

if (isset($_POST["action"])) {
    if ($_POST["action"] == "getId") {
        load();
    }
}

function load()
{
    global $conn;
    $custId = $_POST["custId"];

    // Get the updated pet records
    $query2 = "SELECT * FROM pet WHERE ownerid = ?";
    $stmt = mysqli_prepare($conn, $query2);
    mysqli_stmt_bind_param($stmt, "s", $custId);
    mysqli_stmt_execute($stmt);
    $resultPets = mysqli_stmt_get_result($stmt);

    // Check if there are pets to display
    if (mysqli_num_rows($resultPets) > 0) {
        while ($rowPet = mysqli_fetch_assoc($resultPets)) {
            $petId = $rowPet["id"];
            $species = $rowPet["species"];
            $name = $rowPet["petname"];
?>
            <tr id="<?php echo $petId; ?>">
                <td class="view-button" onclick="
                viewPetInfo(
                    '<?php echo $petId; ?>', 
                    '<?php echo $name; ?>', 
                    '<?php echo $rowPet['breed']; ?>', 
                    '<?php echo $species; ?>', 
                    '<?php echo $rowPet['birthdate']; ?>',
                    '<?php echo $petId; ?>',
                    '<?php echo $rowPet['ownerfirstname']; ?>',
                    '<?php echo $rowPet['ownerid']; ?>');
                    submitData('getPetID');
                    ">
                    <span class="material-symbols-outlined"> toc </span>
                </td>
                <?php require 'customer-pet-record-data.js.php'; ?>
                <td>
                    <!-- mark pet -->
                    <?php
                    $query3 = "SELECT * FROM schedule WHERE status = ? AND ownerid = ?";
                    $stmt2 = mysqli_prepare($conn, $query3);

                    $status = 'Past';
                    mysqli_stmt_bind_param($stmt2, "ss", $status, $custId);
                    mysqli_stmt_execute($stmt2);
                    $resultPets2 = mysqli_stmt_get_result($stmt2);

                    $petArray = array();

                    if (mysqli_num_rows($resultPets2) > 0) {
                        while ($rowPet = mysqli_fetch_assoc($resultPets2)) {
                            $petArray[] = $rowPet["petname"];
                            $petArray[] = $rowPet["petname2"];
                            $petArray[] = $rowPet["petname3"];
                            $petArray[] = $rowPet["petname4"];
                            $petArray[] = $rowPet["petname5"];
                        }

                        if (in_array($name, $petArray)) {
                    ?>
                            <button type="button" class="done-button" style=" background-color: #00000000;
                    border-style: none;
                    color: #fa5d5a;
                    cursor: pointer;">
                                <span class="material-symbols-outlined">
                                    check_small
                                </span>
                            </button>
                    <?php
                        } else {
                            //
                        }
                    } else {
                        // Handle the case when there are no pets to display
                        //echo 'No Pet';
                    }
                    ?>
                </td>
                <td><?php echo $name; ?></td>
                <td><?php echo $species; ?></td>
                <td class="delete-button">
                    <span class="material-symbols-outlined" onclick="submitData('delete'); deletePet('<?php echo $petId; ?>');"> delete </span>
                </td>
                <?php require 'customer-pet-record-data.js.php'; ?>
            </tr>
<?php
        }
    } else {
        // Handle the case when there are no pets to display
        echo 'No Pet';
    }
}
?>