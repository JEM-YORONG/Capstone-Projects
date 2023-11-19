<?php
require 'database-conn.php';
$filter = $_GET["id"];
$query = "SELECT * FROM announcement";

$result = mysqli_query($conn, $query);
function loop($result)
{
    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $imageName = $row['imagename'];
        $imageType = $row['imagetype'];
        $imageData = $row['imagedata'];
?>
        <div class="box box2" id="div-container">
            <?php
            $imageScr = "data:" . $imageType . ";base64," . base64_encode($imageData);
            ?>
            <img class="gumanaKa" src="<?php echo $imageScr; ?>" alt="" id="imagename<?php echo $index; ?>" />
            <h3 class="title" id="title"><?php echo $row["title"]; ?></h3>
            <p class="desc">
                <?php echo $row["description"]; ?>
            </p>
            <br />
            <div class="action">
                <p class="date" id="date"><?php echo $row["date"]; ?></p>
                &nbsp; &nbsp; &nbsp;
                <p class="edit-bttn">
                    <span class="material-symbols-outlined" onclick="openEditAnnouncement(); getInfo('<?php echo $row['imagename']; ?>', '<?php echo $imageScr; ?>', '<?php echo $row['title']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['id']; ?>');">
                        edit
                    </span>
                </p>
                &nbsp; &nbsp;
                <p class="delete-bttn" onclick="getRow('<?php echo $row['id']; ?>'); submitData('Delete');">
                    <span class="material-symbols-outlined"> delete </span>
                </p>
            </div>
        </div>
<?php
        $index++;
    }
}

loop($result);
?>