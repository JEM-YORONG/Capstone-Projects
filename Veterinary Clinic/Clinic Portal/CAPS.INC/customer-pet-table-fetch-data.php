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
                    '<?php echo $rowPet['birthdate']; ?>');
                    addRecord();">

                    <span class="material-symbols-outlined"> toc </span>
                </td>
                <td><?php echo $name; ?></td>
                <td><?php echo $species; ?></td>
                <td class="delete-button">
                    <span class="material-symbols-outlined" onclick="submitData('delete'); deletePet('<?php echo $petId; ?>');"> delete </span>
                </td>
                <?php require 'script files\customer-pet-record-data.js.php'; ?>
            </tr>
<?php
        }
    } else {
        // Handle the case when there are no pets to display
        echo 'No Pet';
    }
}
?>