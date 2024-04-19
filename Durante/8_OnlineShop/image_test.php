
<HTML>
<HEAD>
<TITLE>Upload Image to MySQL BLOB</TITLE>
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>
.image-gallery {
    text-align:center;
}
.image-gallery img {
    padding: 3px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    border: 1px solid #FFFFFF;
    border-radius: 4px;
    margin: 20px;
}
</style>
</HEAD>
<BODY>
    <form action="#"
        method="post">
        <div class="phppot-container tile-container">
            <label>Upload Image File:</label>
            <div class="row">
                <input name="userImage" id="userImage" type="file" class="full-width" />
            </div>
            <div class="row">
                <input type="submit" value="Submit" id="submit" name="submit" />
            </div>
        </div>
    </form>
    <?php
        if(isset($_POST['submit'])){ 
            //$imgData = file_get_contents($_FILES['userImage']['tmp_name']);
            $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name'])); 
            $sql = "INSERT INTO `tbl_image` (`imageId`, `imageData`) VALUES (NULL,$imgData)";
            $result = $db_connection->query($sql);

        }
        
        
?>
</BODY>
</HTML>