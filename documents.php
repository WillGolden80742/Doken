<?php include 'index.php' ?>

<style id="stylePic">
    .salvarNew {
        display: none;
    }
    #doc { 
        background-image:url("Images/document-Icon.png"); 
    }
</style>
<?php
    $auth = new AutenticateController();
    $result = $user->downloadDocs(new StringT($_SESSION['nickName']));
    $documents="";
    echo "<style class=\"documentPics\">";
    foreach($result as $value) {
        echo "#doc".$value["docId"]."{ background-image:url(data:image/jpeg;base64,". base64_encode($value["picture"])."); }";
        $documents.="<div class='document'><center><img src='Images/edit.png'/ id='doc".$value["docId"]."' onclick='openfile(".$value["docId"].");' ></center>";
        $documents.="<p>Documento: </br>". $value["type"]."</p>";
        $documents.="<form action=\"uploadDocs.php?\" method=\"post\" enctype=\"multipart/form-data\"> <input id=\"editProfilePic".$value["docId"]."\" accept=\".jpeg,.jpg,.png\" style=\"display:none;\" onchange=\"display(".$value["docId"].");\" id=\"editProfile\" type=\"file\" name=\"pic\"> <input type='hidden' name='id' value='".$value["docId"]."'></input> <input class=\"inputSubmit salvar salvar".$value["docId"]."\" type=submit value=\"SALVAR\"> </form> ";
        $documents.="</div>";
    }
    echo "</style>";
    $typesDoc = $user->typesDoc();
    if (sizeof($typesDoc) > 0) {
        $documents.="<div class='document documentNew'><center><img src='Images/edit.png'/ id='doc' onclick=\"openfile('New');\" ></center>";
        $documents.="</br>";
        $documents.="<form action=\"uploadDocs.php?\" method=\"post\" enctype=\"multipart/form-data\">";
        $documents.="<select class=\"selectDoc\" name=\"id\">"; 
        foreach($typesDoc as $value) {
            $documents.="<option value=\"".$value["docId"]."\">".$value["type"]."</option>";
        }
        $documents.="</select>";
        $documents.="<input id=\"editProfilePicNew\" accept=\".jpeg,.jpg,.png\" onchange=\"display('New');\" style=\"display:none;\" id=\"editProfile\" type=\"file\" name=\"pic\"> <input class=\"inputSubmit salvarNew\" type=submit value=\"ENVIAR\"> </form> ";
        $documents.="</div>";
    }
    echo $documents;
?>