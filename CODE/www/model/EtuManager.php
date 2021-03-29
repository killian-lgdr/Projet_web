<?php
    require_once("Manager.php");
    class EtuManager extends Manager
    {
        public function getEtudiant($nom, $prenom){
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT nom_Etudiant, prenom_Etudiant, localisation.nom_localisation, niveauetudes.promotion from Etudiant inner join localisation on etudiant.ID_Localisation = localisation.ID_localisation inner join identifiants on etudiant.ID_Identifiant = identifiants.ID_Identifiant inner join niveauetudes on etudiant.ID_NiveauEtudes = niveauetudes.ID_NiveauEtudes where etudiant.nom_Etudiant = :nom1 AND etudiant.prenom_Etudiant = :prenom1 ;');
            $req->execute(array('nom1' => $nom, 'prenom1' => $prenom));
            return $req;
        }
        public function addEtudiant($nom, $prenom, $ville, $identifiant, $mdp, $promotion){
            $db = $this->dbConnect();

            $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $ville, 'ville2' => $ville));
                
            $req2 = $db->prepare("Insert into identifiants (nom_Identifiant, mdp_Identifiant) Select :identifiant1 , :mdp1 Where not exists(select nom_Identifiant, mdp_Identifiant from identifiants where nom_Identifiant = :identifiant2 );");
            $req2->execute(array('identifiant1' => $identifiant, 'mdp1' => $mdp, 'identifiant2' => $identifiant));
                
            $req3 = $db->prepare("INSERT INTO etudiant (nom_Etudiant, prenom_Etudiant, ID_Localisation, ID_NiveauEtudes, ID_Identifiant) SELECT :nom1 , :prenom1 ,(SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ),(SELECT ID_NiveauEtudes FROM niveauetudes WHERE niveauetudes.promotion = :promotion1 ),(SELECT ID_Identifiant FROM identifiants WHERE identifiants.nom_Identifiant = :identifiant1 AND identifiants.mdp_Identifiant = :mdp1 ) WHERE NOT EXISTS (SELECT nom_Pilote, prenom_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom2 AND pilote.prenom_Pilote = :prenom2 );");
            $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'ville1' => $ville,'promotion1' => $promotion,'identifiant1' => $identifiant, 'mdp1' => $mdp, 'nom2' => $nom, 'prenom2' => $prenom));

        }
        public function updateEtudiant($nom, $prenom, $ville, $promotion){

        }
        public function deleteEtudiant($nom, $prenom, $identifiant){

        }

    }
    ?>