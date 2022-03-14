<?php include 'index.php' ?>

<style id="stylePic">
    .salvarNew {
        display: none;
    }
</style>
<?php
    $result = $user->downloadDocs($_SESSION['nickName']);
    $auth = new AutenticateController();
    $documents="";
    echo "<style class=\"documentPics\">";
    foreach($result as $value) {
        echo "#doc".$value["docId"]."{ background-image:url(data:image/jpeg;base64,". base64_encode($value["picture"])."); }";
        $documents.="<div class='document'><center><img src='Images/edit.png'/ id='doc".$value["docId"]."' onclick='openfile(".$value["docId"].");' ></center>";
        $documents.="<p>Documento: </br>". $value["type"]."</p><p>Hash : <br><input class='inputHash' type=text value='".$auth-> encrypt($value["picture"])."'></input>";
        $documents.="<form action=\"uploadDocs.php?doc=".$value["docId"]."&id=".$value["docId"]."\" method=\"post\" enctype=\"multipart/form-data\"> <input id=\"editProfilePic".$value["docId"]."\" accept=\".jpeg,.jpg,.png\" style=\"display:none;\" onchange=\"display(".$value["docId"].");\" id=\"editProfile\" type=\"file\" name=\"pic".$value["docId"]."\"> <input class=\"inputSubmit salvar salvar".$value["docId"]."\" type=submit value=\"SALVAR\"> </form> ";
        $documents.="</div>";
    }
    echo "</style>";
    $documents.="<div class='document'><center><img src='Images/edit.png'/ id='doc' onclick=\"openfile('New');\" ></center>";
    $documents.="</br><select class=\"selectDoc\" name=\"select\">";
    $documents.="<option value=\"valor1\">Valor 1</option>";
    $documents.="<option value=\"valor2\" selected>Valor 2</option>";
    $documents.="<option value=\"valor3\">Valor 3</option>";
    $documents.="</select>";
    $documents.="<form action=\"uploadDocs.php?\" method=\"post\" enctype=\"multipart/form-data\">";
    $documents.="<input id=\"editProfilePicNew\" accept=\".jpeg,.jpg,.png\" onchange=\"display('New');\" style=\"display:none;\" id=\"editProfile\" type=\"file\" name=\"pic\"> <input class=\"inputSubmit salvarNew\" type=submit value=\"NOVO\"> </form> ";
    $documents.="</div>";
    echo $documents;
?>