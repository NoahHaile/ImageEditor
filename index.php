<html>
    <head>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <main>
            <div id="slideshow">
            <?php 
 
            require_once 'db_Config.php'; 
            
            $result = $db->query("SELECT image FROM images ORDER BY id DESC"); 
            ?>
            
            <?php if($result->num_rows > 0){ ?> 
                <div class="gallery"> 
                    <?php while($row = $result->fetch_assoc()){ ?> 
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" height="100%" width="10%" onclick="loadImage(this);"/> 
                    <?php } ?> 
                </div> 
            <?php }else{ ?> 
                <p class="status error">Image(s) not found...</p> 
            <?php } ?>
            </div>
            <div id="image">
                    
            </div>
            <div id="options">
                <button class="crop">Crop</button>
                <button class="grayscale">Grayscale</button>
                <button class="sepia">Sepia</button>
                <button class="edgeDetection">Edge Detection</button>
            </div>
            <div id="upload" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label>Select Image File:</label>
                    <input type="file" name="image">
                    <input type="submit" name="submit" value="Upload">
                </form>
            </div>
        </main>
        <?php 
 
require_once 'db_Config.php'; 

    $sql = "SELECT image FROM images WHERE id=3";
    $result = mysqli_query($db, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    echo $row["image"];
    mysqli_close($db);
 ?>
        
    </body>
    <script src="Editor.js"></script> 
    </html>