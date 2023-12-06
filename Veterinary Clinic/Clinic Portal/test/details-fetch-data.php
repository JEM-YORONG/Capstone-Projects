<?php
require "database-conn.php";

if (isset($_POST["action"])) {
    if ($_POST["action"] == "id") {
        fetchData();
    }
}

function fetchData()
{
    global $conn;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "SELECT * FROM schedule WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $petNames = array(
                $row["petname"],
                $row["petname2"],
                $row["petname3"],
                $row["petname4"],
                $row["petname5"]
            );
            $services = array(
                $row["service"],
                $row["service2"],
                $row["service3"],
            );

            foreach ($petNames as $petName) {
                if ($petName == "") {
                    continue;
                }

                // Query the "pet" table to get the breed and species based on pet name
                $petQuery = "SELECT breed, species FROM pet WHERE petname = '$petName'";
                $petResult = mysqli_query($conn, $petQuery);
                $petRow = mysqli_fetch_assoc($petResult);

                $breed = $petRow["breed"];
                $species = $petRow["species"];

?>
                <tr>
                    <td data-label="Pet Name"><?php echo $petName; ?></td>
                    <td data-label="Breed"><?php echo $breed; ?></td>
                    <td data-label="Species"><?php echo $species; ?></td>
                    <td data-label="Services">
                        <?php
                        $serviceCount = count($services);
                        foreach ($services as $index => $service) {
                            echo $service;
                            // Add a <br> tag after each service except the last one
                            if ($index < $serviceCount - 1) {
                                echo "<br>";
                            }
                        }
                        ?>
                    </td>
                </tr>
<?php
            }
        }
    }
}
