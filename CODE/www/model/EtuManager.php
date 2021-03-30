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
        public function deleteEtudiant($nom, $prenom)
        {
            $db = $this->dbConnect();
            $req2 = $db->prepare('DELETE FROM identifiant WHERE ID_Identifiant = (SELECT ID_Identifiant FROM etudiant WHERE nom_Etudiant = :nom AND prenom_Etudiant = :prenom)');
            $req2->execute(array('nom' => $nom, 'prenom' => $prenom));
                
            $req3 = $db->prepare("DELETE FROM etudiant WHERE nom_Etudiant = :nom AND prenom_Etudiant = :prenom");
            $req3->execute(array('nom' => $nom, 'prenom' => $prenom));
        }

        public function getWishlistPostule($prenom, $nom)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT nom_Offre,nom_Competence , duree, salaire, date, nombrePlace, nom_Localisation, nom_Entreprise, promotion FROM Offre
                                inner join localisation on offre.ID_Localisation = localisation.ID_localisation 
                                inner join entreprise on offre.ID_Entreprise = entreprise.ID_Entreprise
                                inner join niveauetudes on offre.ID_NiveauEtudes = niveauetudes.ID_NiveauEtudes
                                inner join requiert on offre.ID_Offre = requiert.ID_Offre
                                inner join competence on requiert.ID_Competence = competence.ID_Competence
                                inner join a_wishlist on offre.ID_Offre = a_wishlist.ID_Offre
                                WHERE a_wishlist.ID_Etudiant = (SELECT ID_Etudiant FROM etudiant WHERE prenom_Etudiant = :prenom AND nom_Etudiant = :nom)');
            $req->execute(array('prenom'=>$prenom, 'nom'=>$nom));
            $req1 = $db->prepare('SELECT nom_Offre,nom_Competence , duree, salaire, date, nombrePlace, nom_Localisation, nom_Entreprise, promotion, a_postule.Etat FROM Offre
                                inner join localisation on offre.ID_Localisation = localisation.ID_localisation 
                                inner join entreprise on offre.ID_Entreprise = entreprise.ID_Entreprise
                                inner join niveauetudes on offre.ID_NiveauEtudes = niveauetudes.ID_NiveauEtudes
                                inner join requiert on offre.ID_Offre = requiert.ID_Offre
                                inner join competence on requiert.ID_Competence = competence.ID_Competence
                                inner join a_postule on offre.ID_Offre = a_postule.ID_Offre
                                WHERE a_postule.ID_Etudiant = (SELECT ID_Etudiant FROM etudiant WHERE prenom_Etudiant = :prenom AND nom_Etudiant = :nom)');
            $req1->execute(array('prenom'=>$prenom, 'nom'=>$nom));
        }
    }
    ?>