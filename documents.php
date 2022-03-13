<?php include 'index.php' ?>

<?php
    $result = $user->downloadDocs($_SESSION['nickName']);
    $auth = new AutenticateController();
    foreach($result as $value) {
        echo "<div class='document'><center><img src='Images/edit.png'/ style='background-image:url(data:image/jpeg;base64,". base64_encode($value["picture"]).");' ></center><p>Documento: </br>". $value["type"]."</p><p>Hash : <br><input class='inputHash' type=text value='".$auth-> encrypt($value["picture"])."'></input></div>";
    }
?>