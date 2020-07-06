<?php
session_start();
if($_POST){
    if(isset($_FILES['upload'])){
        
        $name_file =  $_SESSION['id']."_".$_FILES['upload']['name'];
        $tmp_name =  $_FILES['upload']['tmp_name'];
        $locate_img ="img/slip/";
        move_uploaded_file($tmp_name,$locate_img.$name_file);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>getForm</title>
    </head>
    <body>
            Img:<img style="width: 200px;height: 200px" src="img/slip/<?php print_r($name_file)?>">
    </body>
</html>