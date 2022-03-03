<?php
    include 'ConnectionFactory/ConnectionFactory.php';
    include 'Controller/StringT.php';
    session_start();
    class AutenticateModel {
        private $conFactory;
        function __construct() {
            $this->conFactory = new ConnectionFactory();
        }
        // USER 
        function checkLogin (StringT $nick,$pass) {   
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("SELECT * FROM clientes where nickName = :nick and senha = :pass");
            $query->bindParam(':nick',$nick, PDO::PARAM_STR);
            $query->bindParam(':pass',$pass, PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC); 
        }

        function singUp (StringT $name,StringT $nick,$pass) { 
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query = $connection->query("INSERT INTO clientes (nomeCliente, nickName, senha) VALUES (:name,:nick,:pass)");
            $query->bindParam(':name',$name, PDO::PARAM_STR);
            $query->bindParam(':nick',$nick, PDO::PARAM_STR);
            $query->bindParam(':pass',$pass, PDO::PARAM_STR);
            return $connection->execute($query);
        }    

        function checkNick (StringT $nick) {
            // Recomendado uso de prepare statement 
            $connection = $this->conFactory;
            $query =  $connection->query("SELECT * FROM clientes where nickName = :nick");
            $query->bindParam(':nick',$nick, PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC);
        }   
  
    }
?>