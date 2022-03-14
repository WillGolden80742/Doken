<?php
    include 'Model/UsersModel.php';

    class UsersController {
        private $auth;
        private $sessions;
        function __construct() {
            $this->auth = new AutenticateController();
            $this->user = new UsersModel();
            $this->sessions = new Sessions();
            $this->auth->isLogged();
        } 
        
        function uploadProfilePic (StringT $nick,$pic,$format) {
            $this->user->uploadProfilePic($nick,$pic,$format);
        }

        function uploadDocPic (StringT $nick,$pic,$docType) {
            $this->user->uploadDocPic($nick,$pic,$docType);
            header("Location: documents.php");
        }

        function uploadProfile (StringT $nick,$pass,StringT $newNick,$name) {      
            if ($this->auth->checkLogin($nick,$pass)) {
                if (!$this->auth->checkNick (new StringT($newNick)) || strcmp($nick,$newNick) == 0) {
                    if($this->user->uploadProfile($nick,$this->auth->encrypt($newNick.$pass),$newNick,$name)) {
                        $_SESSION['nickName']=$newNick;
                        header("Location: editProfile.php?message=Alteração com sucesso!");
                        die();
                    } else {
                        header("Location: editProfile.php");
                        die(); 
                    }
                } else if ($this->auth->checkNick ($newNick)) {
                    header("Location: editProfile.php?error=@".$newNick." já existente");
                    die();
                }
            } else {
                header("Location: editProfile.php?error=senha incorreta");
                die();
            }         
        }

        function uploadPassword ($nick,$pass,$newPass,$newPassConfirmation) {
            if ($this->auth->checkLogin(new StringT($nick),$pass)) {
                $passCertification = $this->auth->passCertification($newPass,$newPassConfirmation);
                if ($passCertification[0]) {
                    if($this->user->uploadPassword($nick,$this->auth-> encrypt($nick.$newPass))) {
                        header("Location: editPassword.php?message=Senha alterada com sucesso!");
                        die();
                    }
                } else {
                    header("Location: editPassword.php?error=".$passCertification[1]);
                    die();
                }
            } else {
                header("Location: editPassword.php?error=senha incorreta");
                die();
            }        
        }        

        function name (StringT $nick) {
            $result = $this->user->name($nick); 
            foreach($result as $value) {
                echo  $value;
            }
        }

        function downloadProfilePic (StringT $contactNickName) {
            $result = $this->user->downloadProfilePic($contactNickName);
            if (!empty($result) > 0) {
                foreach($result as $value) {
                    $pic = "data:image/jpeg;base64," . base64_encode($value["picture"]);
                }
            } else {
                $pic = "Images/profilePic.png";
            }
            return $pic;
        }  
        
        function downloadDocs (StringT $contactNickName) {
            $result = $this->user->downloadDocs($contactNickName);
            if (!empty($result) > 0) {
                return $result;
            } else {
                $pic = array();
            }
            return $pic;
        }  

                
        function typesDoc  () {
            $result = $this->user->typesDoc();
            if (!empty($result) > 0) {
                return $result;
            } else {
                $pic = array();
            }
            return $pic;
        }  

  
    }
?>