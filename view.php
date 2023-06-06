<?php 
 
require_once 'db_Config.php'; 

    $sql = "SELECT image FROM images WHERE id=1";
    $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    header("Content-type: " . $row["imageType"]);
    echo $row["imageData"];
    mysqli_close($conn);
 ?>