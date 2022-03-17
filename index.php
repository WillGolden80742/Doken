<?php 
    include 'Controller/UsersController.php';    
    $user = new UsersController(); 
?>
<DOCTYPE html>
<html>
<head>
<script src="assets/js/javascript.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.js"></script>
<link rel="stylesheet" href="assets/css/styles.css">
  <style id="styleIndex">

    @media only screen and (max-width: 1080px) {
      .contacts, .search:hover {
        width:97%;
      }
      .contacts {
        height: 90%;
      }

      .header {
        font-size:20px;
      }
      .menu {
        font-size:28px;
      }
      .search {
        height:82px; 
        background-image: url("Images/search-dark.png");
        background-position-y:20px;
        background-position-x:0px;
        left:92%;
        font-size:32px;
      }
      .search:hover{
        background-image: url("Images/search-dark.png");
        background-position-y:20px;
        border-radius:40px;
      }
      .contacts a h2 img {
        width:128px;
        height:128px;
      }
      .contacts a h2, .user  {
        font-size:64px;
      }
      .header {
        height:80px;
      }
      .back img, .logout img{
        width:30px;
      }
      .down {
        top:0px;
      }

    } 

  </style>  

</head>    
<body class="container">

<?php

    echo "<div  class=\"header\"><h2>";
    echo "<a class='logout' href='logout.php' ><img src=\"Images/logout.png\" /></a>";
    echo "<a class='back' href='index.php' ><img src=\"Images/left-arrow.png\" /></a>&nbsp";    
    echo "<span class='user'>".$user->name(new StringT($_SESSION['nickName']))."<div class=\"menu\"> •••<ul><a href=\"index.php\"><li>Pagina Inicial</li></a><a href=\"editProfile.php\"><li>Editar perfil</li></a><a href=\"documents.php\"><li>Documentos</li></a></ul></div></span></h2>";
    echo "&nbsp&nbsp<form action=\"index.php\" method=\"post\"><input class=\"search\" placeholder='Pesquisar contatos ...' type=text name=search></form>";
    $userNickName = new StringT($_SESSION['nickName']);
    echo "</div>";
    
?>   

</body>
</html>

