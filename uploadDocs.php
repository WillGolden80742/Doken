<?php 
    include 'Controller/UsersController.php'; 
    include 'Controller/FileController.php';
    $user = new UsersController();
    $pic = "pic";
    if (!empty($_FILES[$pic])) {
        $fileController = new FileController($_FILES[$pic]);
        $file = $fileController->getFile();
        if ($file) {
            $user->uploadDocPic (new StringT($_SESSION['nickName']),$file,$_POST['id']);
        } else {
            echo $fileController->getError();
        }
    } 
?>