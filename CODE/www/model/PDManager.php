<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
//===============Délegué===============
        public function getDelegue($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Delegue, prenom_Delegue, localisation.nom_localisation, GROUP_CONCAT(CONCAT(\'0\',attribue.ID_droits) SEPARATOR \',\') as ges_droit from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation inner join identifiants on delegue.ID_Identifiant = identifiants.ID_Identifiant inner join attribue on identifiants.ID_Identifiant = attribue.ID_Identifiant where delegue.nom_Delegue = :nom1 AND delegue.prenom_Delegue = :prenom1 ;');
                $req->execute(array('nom1' => $nom, 'prenom1' => $prenom));
                return $req;
        }
        public function addDelegue($nom, $prenom, $ville, $identifiant, $mdp, $droit)
        {
            $db = $this->dbConnect();
            $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $ville, 'ville2' => $ville));
            
            $req2 = $db->prepare("Insert into identifiants (nom_Identifiant, mdp_Identifiant) Select :identifiant1 , :mdp1 Where not exists(select nom_Identifiant, mdp_Identifiant from identifiants where nom_Identifiant = :identifiant2 );");
            $req2->execute(array('identifiant1' => $identifiant, 'mdp1' => $mdp, 'identifiant2' => $identifiant));

            $req3 = $db->prepare("INSERT INTO delegue (nom_Delegue, prenom_Delegue, ID_Localisation, ID_Identifiant) SELECT :nom1 , :prenom1 ,(SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ),(SELECT ID_Identifiant FROM identifiants WHERE identifiants.nom_Identifiant = :identifiant1 AND identifiants.mdp_Identifiant = :mdp1 ) WHERE NOT EXISTS (SELECT nom_Delegue, prenom_Delegue FROM delegue WHERE delegue.nom_Delegue = :nom2 AND delegue.prenom_Delegue = :prenom2 );");
            $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'ville1' => $ville, 'identifiant1' => $identifiant, 'mdp1' => $mdp, 'nom2' => $nom, 'prenom2' => $prenom));

            $req4 = $db->prepare("INSERT INTO attribue (ID_Identifiant, ID_droits) VALUES ((SELECT ID_Identifiant FROM identifiants Where identifiants.nom_Identifiant = :identifiant1 ),(SELECT ID_droits FROM droits Where droits.ID_droits= :droit1 ));");
            for ($i=0; $i < strlen($droit)-1; $i+=3) { 
                if ($droit[$i]==0){
                    $res = $droit[$i+1];
                }else{
                    $res = $droit[$i].$droit[$i+1];
                }
                $req4->execute(array('identifiant1' => $identifiant, 'droit1' => $res));
            }
        }
        public function updateDelegue($nom, $prenom, $identifiant, $ville, $droit)
        {
            $db = $this->dbConnect();
            $req1 = $db->prepare("INSERT INTO localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $ville, 'ville2' => $ville));

            $req2 = $db->prepare("UPDATE delegue SET ID_Localisation = (SELECT localisation.ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ) WHERE delegue.nom_Delegue = :nom1 AND delegue.prenom_Delegue = :prenom1 ;");
            $req2->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'ville1' => $ville));

            $req3 = $db->prepare("DELETE FROM attribue WHERE ID_Identifiant = (SELECT ID_Identifiant FROM identifiants Where identifiants.nom_Identifiant = :identifiant1 );");
            $req3->execute(array('identifiant1' => $identifiant));

            $req4 = $db->prepare("INSERT INTO attribue (ID_Identifiant, ID_droits) VALUES ((SELECT ID_Identifiant FROM identifiants Where identifiants.nom_Identifiant = :identifiant1 ),(SELECT ID_droits FROM droits Where droits.ID_droits= :droit1 ));");
            for ($i=0; $i < strlen($droit)-1; $i+=3) { 
                if ($droit[$i]==0){
                    $res = $droit[$i+1];
                }else{
                    $res = $droit[$i].$droit[$i+1];
                }
                $req4->execute(array('identifiant1' => $identifiant, 'droit1' => $res));
            }
        }
        public function deleteDelegue($nom, $prenom, $identifiant)
        {
            $db = $this->dbConnect();

                $req1 = $db->prepare("DELETE FROM attribue WHERE ID_Identifiant = (SELECT identifiants.ID_Identifiant FROM identifiants WHERE nom_Identifiant = :identifiant1) ;");
                $req1->execute(array('identifiant1' => $identifiant));
        
                $req2= $db->prepare("DELETE FROM delegue WHERE delegue.nom_Delegue = :nom1 AND Delegue.prenom_Delegue = :prenom1 ;");
                $req2->execute(array('nom1' => $nom, 'prenom1' => $prenom));

                $req3 = $db->prepare("DELETE FROM identifiants WHERE nom_Identifiant = :identifiant1 ;");
                $req3->execute(array('identifiant1' => $identifiant));
        }
//===============Pilote===============
        public function getPilote($nom, $prenom)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Pilote, prenom_Pilote, localisation.nom_localisation, GROUP_CONCAT(niveauetudes.promotion SEPARATOR \',\') as promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_Localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_Pilote = :nom AND pilote.prenom_Pilote = :prenom ;');
                $req->execute(array('nom' => $nom, 'prenom' => $prenom));
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

            $req5 = $db->query('insert into attribue(ID_Identifiant, ID_droits) VALUES ((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),1),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),2),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),3),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),4),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),5),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),6),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),7),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),8),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),9),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),10),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),11),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),16),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),17),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),18),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),19),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),20),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),21),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),22),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),23),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),24),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),29),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),30),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),31),((Select ID_Identifiant from identifiants WHERE nom_Identifiant= \''.$identifiant.'\'),32) ');
        }
        }

        public function updatePilote($nom, $prenom, $ville, $promotion)
        {

            $db = $this->dbConnect();

            $req1 = $db->prepare("INSERT INTO localisation (nom_Localisation) SELECT :ville1 WHERE NOT EXISTS (SELECT nom_Localisation FROM localisation WHERE nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $ville, 'ville2' => $ville));
                
            $req2 = $db->prepare("UPDATE pilote SET ID_Localisation = (SELECT localisation.ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville1 ) WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 ;");
            $req2->execute(array('ville1' => $ville, 'nom1' => $nom, 'prenom1' => $prenom));
                

            $req3 = $db->prepare("DELETE FROM enseigne_a WHERE ID_Pilote = (SELECT ID_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 );");
            $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom));
            
            $req4 = $db->prepare("INSERT INTO enseigne_a (ID_Pilote, ID_NiveauEtudes) VALUES ((SELECT ID_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 ),(SELECT ID_NiveauEtudes FROM niveauetudes Where niveauetudes.promotion = :promotion1 ));");
            for ($i=0; $i < strlen($promotion)-1; $i+=2) { 
                $req4->execute(array('nom1' => $nom, 'prenom1' => $prenom, 'promotion1' => $promotion[$i].$promotion[$i+1]));
            }
        }

        public function deletePilote($nom, $prenom, $identifiant)
        {
            $db = $this->dbConnect();

            $req = $db->prepare("DELETE FROM attribue WHERE ID_Identifiant = (SELECT identifiants.ID_Identifiant FROM identifiants WHERE nom_Identifiant = :identifiant1) ;");
            $req->execute(array('identifiant1' => $identifiant));

            $req1 = $db->prepare("DELETE FROM enseigne_a WHERE ID_Pilote = (SELECT pilote.ID_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 );");
            $req1->execute(array('nom1' => $nom, 'prenom1' => $prenom));
        
            $req2 = $db->prepare("DELETE FROM possedenotepilote WHERE ID_Pilote = (SELECT pilote.ID_Pilote FROM pilote WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1);");
            $req2->execute(array('nom1' => $nom, 'prenom1' => $prenom));

            $req3= $db->prepare("DELETE FROM pilote WHERE pilote.nom_Pilote = :nom1 AND pilote.prenom_Pilote = :prenom1 ");
            $req3->execute(array('nom1' => $nom, 'prenom1' => $prenom));

            $req4 = $db->prepare("DELETE FROM identifiants WHERE nom_Identifiant= :identifiant1; ");
            $req4->execute(array(':identifiant1' => $identifiant));
        }
    }
?>