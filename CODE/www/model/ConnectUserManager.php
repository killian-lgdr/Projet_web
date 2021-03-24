<?php
    require_once("Manager.php");

    class ConnectUserManager extends Manager
    {
        public function connectUser($psuedo){
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT nom_Identifiant, mdp_Identifiant FROM identifiants WHERE nom_Identifiant = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            return $req;
        }
    }
?>
