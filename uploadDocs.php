<?php 
    include 'Controller/UsersController.php'; 
    $user = new UsersController();

    echo "Doc ID : ".$_GET['doc'];
    echo "</br>Id ".$_GET['id']; 

    $pic = "pic".$_GET['id'];
    if (!empty($_FILES[$pic])) {
        $pic=$_FILES[$pic];
    } 
    if($pic != NULL) {
        $name = time().'.jpg';
        if (move_uploaded_file($pic['tmp_name'], $name)) {
            $size = filesize($name);     
            $maxSize = 1000000;    
            if ($size < $maxSize) {   
                $mysqlImg = addslashes(fread(fopen($name, "r"), $size));
                $user->uploadDocPic ($_SESSION['nickName'],$mysqlImg,$_GET['id']);
            } 
        } 
    }
?>