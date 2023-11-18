<?php
require 'database-conn.php';

$query = "SELECT * FROM aboutus WHERE id = '1'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $imageName = $row['imagename'];
    $imageType = $row['imagetype'];
    $imageData = $row['imagedata'];

    $title = $row['title'];
}

$imageScr = "data:" . $imageType . ";base64," . base64_encode($imageData);
?>
<div class="logo-image">
    <img src="<?php echo $imageScr; ?>" alt="" />
</div>
<span class="logo_name"><label><?php echo $title; ?></label> | <br />
    Vet Portal</span>