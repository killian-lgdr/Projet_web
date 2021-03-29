<?php
    require_once("Manager.php");

    class EntrepriseManager extends Manager
    {
        public function getAllville(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT DISTINCT nom_Localisation FROM localisation INNER JOIN entreprise ON localisation.ID_Localisation = entreprise.ID_Localisation');
            return $req;
        }
        public function getAllSecteurAct(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT DISTINCT secteurActivité FROM entreprise');
            return $req;
        }
        public function getAllEntreprise(){
            $db = $this->dbConnect();
            $req = $db->query('Select entreprise.ID_Entreprise, nom_Entreprise, SecteurActivité, nbStagiaireCesi, localisation.nom_Localisation, ROUND(AVG(valeur_NotePilote)) AS noteP, ROUND(AVG(valeur_NoteEtudiant)) AS noteE 
            from entreprise 
            LEFT join localisation on entreprise.ID_Localisation=localisation.ID_Localisation 
            LEFT join possedenotepilote on entreprise.ID_Entreprise=possedenotepilote.ID_Entreprise 
            LEFT join possedenoteetudiant on entreprise.ID_Entreprise=possedenoteetudiant.ID_Entreprise 
            GROUP BY entreprise.ID_Entreprise');
            return $req;
        }
        public function getEntreprise($entreprise, $ville, $secteur){
            $db = $this->dbConnect();
            $req = $db->prepare('Select entreprise.ID_Entreprise, nom_Entreprise, SecteurActivité, nbStagiaireCesi, localisation.nom_Localisation, ROUND(AVG(valeur_NotePilote)) AS noteP, ROUND(AVG(valeur_NoteEtudiant)) AS noteE 
            from entreprise 
            LEFT join localisation on entreprise.ID_Localisation=localisation.ID_Localisation 
            LEFT join possedenotepilote on entreprise.ID_Entreprise=possedenotepilote.ID_Entreprise 
            LEFT join possedenoteetudiant on entreprise.ID_Entreprise=possedenoteetudiant.ID_Entreprise 
            
            WHERE nom_Entreprise = IF( :entreprise =\'\', nom_Entreprise, :entreprise2 )
            AND nom_Localisation = IF( :ville =\'\', nom_Localisation, :ville2 )
            AND SecteurActivité = IF( :secteur =\'\', SecteurActivité, :secteur2 )
            
            GROUP BY entreprise.ID_Entreprise');
            $req->execute(array('entreprise' => $entreprise,
                                'entreprise2' => $entreprise,
                                'ville' => $ville,
                                'ville2' => $ville,
                                'secteur' => $secteur,
                                'secteur2' => $secteur
                                ));
            return $req;
        }
        public function createEntreprise($ville, $entreprise, $secteur, $nbstage){

            $db = $this->dbConnect();
            $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $ville, 'ville2' => $ville));

            $req = $db->prepare("Insert into entreprise(nom_Entreprise, secteurActivité, nbStagiaireCesi, ID_Localisation) SELECT :entreprise, :secteur, :nbStage, (SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :ville) 
                                WHERE NOT EXISTS (select nom_Entreprise FROM entreprise where entreprise.nom_Entreprise = :entreprise1)");
            $req->execute(array('entreprise'=>$entreprise,
                                'secteur'=>$secteur,
                                'nbStage'=>$nbstage,
                                ':ville'=>$ville,
                                'entreprise1'=>$entreprise));
        }
        public function rechercherEntreprise($entreprise){

            $db = $this->dbConnect();
            $req1 = $db->prepare("SELECT nom_Entreprise, secteurActivité, nbStagiaireCesi, localisation.nom_Localisation FROM entreprise INNER JOIN localisation ON entreprise.ID_Localisation = localisation.ID_Localisation WHERE nom_Entreprise = :entreprise ");
            $req1->execute(array('entreprise' => $entreprise));
            return $req1;
        }
        public function supprimerEntreprise($entreprise){

            $db = $this->dbConnect();
            $req = $db->prepare("DELETE FROM requiert WHERE ID_Offre = (Select offre.ID_Offre From offre WHERE ID_entreprise = (SELECT entreprise.ID_entreprise from entreprise where nom_entreprise = :entreprise))");
            $req->execute(array('entreprise' => $entreprise));
            $req1 = $db->prepare("DELETE FROM offre Where ID_Entreprise = (SELECT entreprise.ID_Entreprise from entreprise WHERE nom_Entreprise = :entreprise)");
            $req1->execute(array('entreprise' => $entreprise));
            $req2 = $db->prepare("DELETE FROM possedenotepilote WHERE ID_Entreprise = (SELECT entreprise.ID_Entreprise from entreprise WHERE nom_Entreprise = :entreprise)");
            $req2->execute(array('entreprise' => $entreprise));
            $req3 = $db->prepare("DELETE FROM possedenoteetudiant WHERE ID_Entreprise = (SELECT entreprise.ID_Entreprise from entreprise WHERE nom_Entreprise = :entreprise)");
            $req3->execute(array('entreprise' => $entreprise));
            $req4 = $db->prepare("DELETE FROM entreprise WHERE entreprise.nom_Entreprise = :entreprise");
            $req4->execute(array('entreprise' => $entreprise));
        }
        public function modifierEntreprise($entreprise, $ville, $secteur, $nbStage){

            $db = $this->dbConnect();
            $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 )");
            $req1->execute(array('ville1' => $ville, 
                                'ville2' => $ville));
            $req = $db->prepare("UPDATE entreprise SET secteurActivité=:secteur,nbStagiaireCesi=:nbStage,ID_Localisation=(SELECT ID_Localisation FROM localisation WHERE nom_Localisation = :ville3) WHERE nom_Entreprise=:entreprise");
            $req->execute(array('entreprise'=>$entreprise,
                                'secteur'=>$secteur,
                                'nbStage'=>$nbStage,
                                ':ville3'=>$ville));
        }

        public function noteEtudiantEntreprise($note, $entreprise){
            $db = $this->dbConnect();

            $req = $db->query('delete from possedenoteetudiant where ID_Entreprise = (select ID_entreprise from entreprise where nom_Entreprise =\'' . $entreprise . '\') AND ID_Etudiant = (select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\')');
            
            $req = $db->query('insert into possedenoteetudiant(ID_entreprise, ID_etudiant, valeur_noteEtudiant) Values ((select ID_Entreprise from entreprise where entreprise.nom_Entreprise =\'' . $entreprise . '\'),(select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'), ' . $note .')');
            return $req;
        }

        public function notePiloteEntreprise($note, $entreprise){
            $db = $this->dbConnect();

            $req = $db->query('delete from possedenotepilote where ID_Entreprise = (select ID_entreprise from entreprise where nom_Entreprise =\'' . $entreprise . '\') AND ID_Pilote = (select ID_Pilote from pilote WHERE nom_Pilote =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Pilote =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\')');

            $req = $db->query('insert into possedenotepilote(ID_entreprise, ID_pilote, valeur_notePilote) Values ((select ID_Entreprise from entreprise where entreprise.nom_Entreprise =\'' . $entreprise . '\'),(select ID_pilote from pilote WHERE nom_Pilote =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Pilote =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'), ' . $note .')');
            return $req;
        }

        public function testEtudiant(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT ID_Etudiant FROM `etudiant` WHERE nom_Etudiant = \'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'');
            return $req->fetch();

        }
    }
?>

