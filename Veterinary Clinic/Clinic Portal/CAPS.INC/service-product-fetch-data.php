<?php
require 'database-conn.php';
$filter = $_GET["filterValue"];
$query = "SELECT * FROM serviceandproduct";
$query2 = "SELECT * FROM serviceandproduct";
$result;

if (!empty($filter)) {
    $query .= " WHERE categories LIKE '%$filter%'";
}

if (!empty($filter) && $filter == "Product") {
    $categories = ["Pet Foods", "Bath Products", "Accessories", "Others"];
    $categoriesStr = implode("', '", $categories);
    $query2 .= " WHERE categories IN ('$categoriesStr')";
    $result = mysqli_query($conn, $query2);
} else {
    $result = mysqli_query($conn, $query);
}

function loop($result) {
    $index = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="box box2" id="div-container">
            <img class="gumanaKa" src="tempImage/<?php echo $row["image"]; ?>" alt="" id="image<?php echo $index; ?>" />
            <h3 class="title" id="title"><?php echo $row["title"]; ?></h3>
            <h6><?php echo $row["categories"]; ?></h6>
            <p class="desc">
                <?php echo $row["description"]; ?>
            </p>
            <br />
            <div class="action">
                <p class="date" id="date"><?php echo $row["date"]; ?></p>
                &nbsp; &nbsp; &nbsp;
                <p class="edit-bttn">
                    <?php
                    $imageFile = "tempImage/" . $row["image"];
                    // Get the image file path
                    ?>
                    <span class="material-symbols-outlined" onclick="openEditServProd(); getInfo('<?php echo $row['image']; ?>', '<?php echo $imageFile; ?>', '<?php echo $row['image']; ?>', '<?php echo $row['title']; ?>', '<?php echo $row['categories']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['id']; ?>');">
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