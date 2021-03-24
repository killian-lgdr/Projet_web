<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
        public function getDelegue($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Delegue, prenom_Delegue, localisation.nom_localisation from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation where delegue.nom_Delegue = :nom AND delegue.prenom_Delegue = :prenom ;');
                $req->execute(array('nomdelegue' => $nom, 'prenomdelegue' => $prenom));
                return $req;
        }
        public function getPilote($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Pilote, prenom_Pilote, localisation.nom_localisation, GROUP_CONCAT(niveauetudes.promotion SEPARATOR \',\') as promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_Localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_Pilote = :nom AND pilote.prenom_Pilote = :prenom ;');
                $req->execute(array('nom' => $nom, 'prenom' => $prenom));
                return $req;
        } 
        
        public function addDelegue($nom, $prenom, $ville, $identifiant, $mdp)
        {
            $db = $this->dbConnect();
                $req = $db->prepare('');
                $req->execute(array('nom' => $nom, 'prenom' => $prenom, 'ville' => $ville,'identifiant' => $identifiant, 'mdp' => $mdp));
                return $req;
        }

        public function addPilote($nom, $prenom, $ville, $identifiant, $mdp, $promotion)
        {

            $db = $this->dbConnect();
                $req = $db->prepare('
                Insert into localisation (nom_Localisation) Select :ville where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville ) ;

                Insert into identifiants (nom_Identifiant, mdp_Identifiant) Select :identifiant , :mdp Where not exists(select nom_Identifiant, mdp_Identifiant from identifiants where nom_Identifiant = :identifiant AND mdp_Identifiant = :mdp );

                INSERT INTO pilote (nom_Pilote, prenom_Pilote, ID_Localisation, ID_Identifiant) SELECT :nom , :prenom ,(SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville ),(SELECT ID_Identifiant FROM identifiants WHERE identifiants.nom_Identifiant = :identifiant AND identifiants.mdp_Identifiant = :mdp ) WHERE NOT EXISTS (SELECT nom_Pilote, prenom_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom AND pilote.prenom_Pilote = :prenom );
                
                INSERT INTO `enseigne_a`(`ID_Pilote`, `ID_NiveauEtudes`) VALUES ((SELECT ID_Pilote FROM pilote Where pilote.nom_Pilote = :nom AND pilote.prenom_Pilote = :prenom ),(SELECT ID_NiveauEtudes FROM niveauetudes Where niveauetudes.promotion= :promotion ));
                ');

                //for ($i=0; $i < strlen($promotion)-1; $i+=2) { 
                    $req->execute(array('nom' => $nom, 'prenom' => $prenom, 'ville' => $ville, 'identifiant' => $identifiant, 'mdp' => $mdp, 'promotion' => $promotion[0].$promotion[1]));
                //}
                    
                    
                

                return $req;
        }
    }
?>