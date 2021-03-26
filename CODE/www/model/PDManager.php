<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
        public function getDelegue($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Delegue, prenom_Delegue, localisation.nom_localisation from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation where delegue.nom_Delegue = :nom1 AND delegue.prenom_Delegue = :prenom1 ;');
                $req->execute(array('nom1' => $nom, 'prenom1' => $prenom));
                return $req;
        }
        public function getPilote($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Pilote, prenom_Pilote, localisation.nom_localisation, GROUP_CONCAT(niveauetudes.promotion SEPARATOR \',\') as promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_Localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_Pilote = :nom AND pilote.prenom_Pilote = :prenom ;');
                $req->execute(array('nom' => $nom, 'prenom' => $prenom));
                return $req;
        } 
        
        public function addDelegue($nom, $prenom, $ville, $identifiant, $mdp, $droit)
        {
            $db = $this->dbConnect();
                $req = $db->prepare('');
                $req->execute(array('nom' => $nom, 'prenom' => $prenom, 'ville' => $ville,'identifiant' => $identifiant, 'mdp' => $mdp));
                return $req;
        }

        public function addPilote($nom, $prenom, $ville, $identifiant, $mdp, $promotion)
        {

            $db = $this->dbConnect();
                $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
                $req1->execute(array('ville1' => $ville, 'ville2' => $ville));
                
                $req2 = $db->prepare("Insert into identifiants (nom_Identifiant, mdp_Identifiant) Select :identifiant1 , :mdp1 Where not exists(select nom_Identifiant, mdp_Identifiant from identifiants where nom_Identifiant = :identifiant2 );");
                $req2->execute(array('identifiant1' => $identifiant, 'mdp1' => $mdp, 'identifiant2' => $identifiant));
                
                $req3 = $db->prepare("INSERT INTO pilote (nom_Pilote, prenom_Pilote, ID_Localisation, ID_Identifiant) SELECT :nom1 , :prenom1 ,(SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ),(SELECT ID_Identifiant FROM identifiants WHERE identifiants.nom_Identifiant = :identifiant1 AND identifiants.mdp_Identifiant = :mdp1 ) WHERE NOT EXISTS (SELECT nom_Pilote, prenom_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom2 AND pilote.prenom_Pilote = :prenom2 );");
                $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'ville1' => $ville, 'identifiant1' => $identifiant, 'mdp1' => $mdp, 'nom2' => $nom, 'prenom2' => $prenom));
                

                $req4 = $db->prepare("INSERT INTO enseigne_a (ID_Pilote, ID_NiveauEtudes) VALUES ((SELECT ID_Pilote FROM pilote Where pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 ),(SELECT ID_NiveauEtudes FROM niveauetudes Where niveauetudes.promotion= :promotion1 ));");
                for ($i=0; $i < strlen($promotion)-1; $i+=2) { 
                    $req4->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'promotion1' => ($promotion[$i].$promotion[$i+1])));
                }
                    
                    
                

                return $req1;
        }
    }
?>