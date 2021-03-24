<?php
    require_once("Manager.php");

    class ConnectUserManager extends Manager
    {
        public function connectUser($pseudo){
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT ID_Identifiant, nom_Identifiant, mdp_Identifiant FROM identifiants WHERE nom_Identifiant = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            return $req;
        }
    }
?>
