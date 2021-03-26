<?php
    require_once("Manager.php");

    class EntrepriseManager extends Manager
    {
        public function getAllville(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT DISTINCT nom_Localisation FROM Localisation');
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
                                WHERE NOT EXISTS (select nom_Entreprise FROM entreprise where entreprise.nom_entreprise = :entreprise1");
            $req->execute(array('entreprise'=>$entreprise,
                                'secteur'=>$secteur,
                                'nbStage'=>$nbstage,
                                ':ville'=>$ville,
                                'entreprise1'=>$entreprise));
        }
        public function rechercherEntreprise($entreprise){

            $db = $this->dbConnect();
            $req1 = $db->prepare("SELECT nom_Entreprise, secteurActivité, nbStagiaireCesi, localisation.nom_Localisation FROM entreprise INNER JOIN localisation ON entreprise.ID_Localisation = localisation.ID_Localisation WHERE nom_Entreprise=:entreprise;");
            $req1->execute(array('entreprise' => $entreprise));

        }
    }
?>

