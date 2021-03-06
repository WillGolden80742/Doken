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

        function createToken() {
            $date = new DateTime();
            $connection = $this->conFactory;
            $query = $connection->query("DELETE FROM token WHERE clienteId =:nick");
            $query->bindParam(':nick',$_SESSION['nickName'], PDO::PARAM_STR);
            $connection->execute($query);
            $query = $connection->query("INSERT INTO token (clienteID, tokenHash) VALUES (:nick,:tokenHash)");
            $query->bindParam(':nick',$_SESSION['nickName'], PDO::PARAM_STR);
            $hash = hash("sha512",$_SESSION['nickName'].$date->getTimestamp().rand(),false);
            $_SESSION['token'] = $hash;
            $query->bindParam(':tokenHash',$hash, PDO::PARAM_STR);
            $connection->execute($query);
        }

        function checkToken() {
            $connection = $this->conFactory;
            $query =  $connection->query("SELECT * FROM token where tokenHash = :token");
            $query->bindParam(':token',$_SESSION['token'], PDO::PARAM_STR);
            return $connection->execute($query)->fetch(PDO::FETCH_ASSOC);
        }

        function deleteToken() {
            $connection = $this->conFactory;
            $query = $connection->query("DELETE FROM token WHERE clienteId =:nick");
            $query->bindParam(':nick',$_SESSION['nickName'], PDO::PARAM_STR);
            $connection->execute($query);
        }

    }
?>