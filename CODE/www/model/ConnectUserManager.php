<?php
    require_once("Manager.php");

    class ConnectUserManager extends Manager
    {
        public function connectUser($pseudo){
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT nom_Identifiant, mdp_Identifiant, GROUP_CONCAT(nom_Droits SEPARATOR \',\') AS droits
            FROM identifiants
            INNER JOIN attribue ON attribue.ID_Identifiant = identifiants.ID_Identifiant
            INNER JOIN droits ON droits.ID_droits = attribue.ID_droits
            
            WHERE nom_Identifiant = :pseudo');
            $req->execute(array(
                'pseudo' => $pseudo));
            return $req;
        }
    }
?>
