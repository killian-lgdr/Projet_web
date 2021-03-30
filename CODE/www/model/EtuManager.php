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
                
            $req3 = $db->prepare("INSERT INTO etudiant (nom_Etudiant, prenom_Etudiant, ID_Localisation, ID_NiveauEtudes, ID_Identifiant) SELECT :nom1 , :prenom1 ,(SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ),(SELECT ID_NiveauEtudes FROM niveauetudes WHERE niveauetudes.promotion = :promotion1 ),(SELECT ID_Identifiant FROM identifiants WHERE identifiants.nom_Identifiant = :identifiant1 AND identifiants.mdp_Identifiant = :mdp1 ) WHERE NOT EXISTS (SELECT nom_Etudiant, prenom_Etudiant FROM etudiant WHERE nom_Etudiant = :nom2 AND prenom_Etudiant = :prenom2 );");
            $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'ville1' => $ville,'promotion1' => $promotion,'identifiant1' => $identifiant, 'mdp1' => $mdp, 'nom2' => $nom, 'prenom2' => $prenom));
            
            $req4 = $db->prepare("DELETE FROM attribue WHERE ID_Identifiant = (SELECT identifiants.ID_Identifiant FROM identifiants WHERE nom_Identifiant = :identifiant1) ;");
            $req4->execute(array('identifiant1' => $identifiant));

            $req5 = $db->query('insert into attribue(ID_Identifiant, ID_droits) VALUES 
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),1),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),2),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),3),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),4),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),5),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),6),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),7),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),11),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),25),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),26),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),27),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),28),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),29),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),30),
            ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),32)');

        }
        public function updateEtudiant($nom, $prenom, $ville, $nEtudes)
        {
            $db = $this->dbConnect();

            $req = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req->execute(array('ville1' => $ville, 'ville2' => $ville));

            $req1 = $db->prepare("UPDATE etudiant SET ID_Localisation=(SELECT ID_Localisation FROM localisation WHERE nom_Localisation=:ville), ID_NiveauEtudes = (SELECT ID_NiveauEtudes FROM niveauetudes WHERE promotion = :promotion) WHERE prenom_Etudiant = :prenom AND nom_Etudiant = :nom;");
            $req1->execute(array('ville' => $ville, 'promotion' => $nEtudes, 'nom' => $nom, 'prenom' => $prenom));
        }
        public function deleteEtudiant($nom, $prenom, $identifiant)
        {
            $db = $this->dbConnect();

            $req1 = $db->prepare("DELETE FROM attribue WHERE ID_Identifiant = (SELECT identifiants.ID_Identifiant FROM identifiants WHERE ID_Identifiant = (SELECT ID_Identifiant from etudiant where nom_etudiant = :nom AND prenom_etudiant = :prenom)) ;");
            $req1->execute(array('nom'=>$nom, 'prenom'=>$prenom));

            $req2 = $db->prepare("DELETE FROM etudiant WHERE nom_Etudiant = :nom AND prenom_Etudiant = :prenom");
            $req2->execute(array('nom' => $nom, 'prenom' => $prenom));

            $req3 = $db->prepare('DELETE FROM identifiants WHERE nom_Identifiant = :identifiant');
            $req3->execute(array('identifiant'=>$identifiant));

        }

        public function getWishlist($prenom, $nom)
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
            return $req;

        }
        public function getPostule($prenom, $nom)
        {
            $db = $this->dbConnect();    
            $req = $db->prepare('SELECT nom_Offre,nom_Competence , duree, salaire, date, nombrePlace, nom_Localisation, nom_Entreprise, promotion, a_postule.Etat FROM Offre
                                inner join localisation on offre.ID_Localisation = localisation.ID_localisation 
                                inner join entreprise on offre.ID_Entreprise = entreprise.ID_Entreprise
                                inner join niveauetudes on offre.ID_NiveauEtudes = niveauetudes.ID_NiveauEtudes
                                inner join requiert on offre.ID_Offre = requiert.ID_Offre
                                inner join competence on requiert.ID_Competence = competence.ID_Competence
                                inner join a_postule on offre.ID_Offre = a_postule.ID_Offre
                                WHERE a_postule.ID_Etudiant = (SELECT ID_Etudiant FROM etudiant WHERE prenom_Etudiant = :prenom AND nom_Etudiant = :nom)');
            $req->execute(array('prenom'=>$prenom, 'nom'=>$nom));
            return $req;
        }
        public function testEtudiant(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT ID_Etudiant FROM `etudiant` WHERE nom_Etudiant = \'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'');
            return $req->fetch();

        }
    }
    ?>