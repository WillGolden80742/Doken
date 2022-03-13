<?php
    include 'Controller/AutenticateController.php';
    include 'Controller/Sessions.php';
    include 'Controller/Message.php';
    class UsersModel {
        private $conFactory;
        private $auth;
        function __construct() {
            $this->conFactory = new ConnectionFactory();
            $this->auth = new AutenticateController();
            $this->auth->isLogged();
        } 
        
        function uploadProfilePic (StringT $nick,$pic,$format) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("DELETE FROM profilepicture WHERE clienteId = :nick");
            $query->bindParam(':nick',$nick, PDO::PARAM_STR);
            $connection->execute($query);
            $query = $connection->query("INSERT INTO profilepicture (clienteId,picture,format) VALUES (:nick,'".$pic."',:format)");
            $query->bindParam(':nick',$nick, PDO::PARAM_STR);
            $query->bindParam(':format',$format, PDO::PARAM_STR);
            $connection->execute($query);
        }

        function uploadProfile (StringT $nick,$pass,StringT $newNick,$name) {   
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("UPDATE clientes SET nickName = :newNick, nomeCliente = :name, senha = :pass WHERE nickName = :nick ");
            $query->bindParam(':newNick',$newNick);
            $query->bindParam(':name',$name);
            $query->bindParam(':pass',$pass);
            $query->bindParam(':nick',$nick);
            return $connection->execute($query);    
        }

        function uploadPassword (StringT $nick,$newPass) { 
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("UPDATE clientes SET senha = :newPass WHERE nickName = :nick ");
            $query->bindParam(':newPass',$newPass);
            $query->bindParam(':nick',$nick);
            return $connection->execute($query);    
        }        
        

        function name(StringT $nick) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("SELECT nomeCliente FROM clientes WHERE nickName = :user ");
            $query->bindParam(':user',$nick, PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC); 
        }

        function downloadProfilePic (StringT $contactNickName) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("SELECT * FROM profilepicture WHERE clienteId = :user");
            $query->bindParam(':user',$contactNickName, PDO::PARAM_STR);
            return $connection->execute($query)->fetchAll(); 
        }  

        function downloadDocs (StringT $contactNickName) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("SELECT * FROM documents inner join typeDoc on  typeDoc = docId WHERE clienteId = :user");
            $query->bindParam(':user',$contactNickName, PDO::PARAM_STR);
            return $connection->execute($query)->fetchAll(); 
        }  
        
  
    }
?>