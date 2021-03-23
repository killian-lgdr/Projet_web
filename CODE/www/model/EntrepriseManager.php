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
            $req = $db->query('Select ID_Entreprise, nom_Entreprise, GROUP_CONCAT(`SecteurActivité` SEPARATOR ", ")AS "Secteur", nbStagiaireCesi, localisation.nom_localisation from entreprise
                                inner join localisation on entreprise.ID_localisation=localisation.ID_localisation
                                GROUP BY entreprise.ID_Entreprise ');
            return $req;
        }
        public function getEntreprise($entreprise){
            $db = $this->dbConnect();
            $req = $db->prepare('Select ID_Entreprise, nom_Entreprise, GROUP_CONCAT(SecteurActivité SEPARATOR ", ")AS "Secteur", nbStagiaireCesi, localisation.nom_Localisation from entreprise
                                inner join localisation on entreprise.ID_localisation=localisation.ID_localisation 
                                WHERE nom_Entreprise = :entreprise
                                GROUP BY entreprise.ID_Entreprise ');
            $req->execute(array('Entreprise' => $entreprise));
            return $req;
        }
        public function getAllNoteEtudiant($entreprise){
            $db = $this->dbConnect();
            $req = $db->prepare('Select AVG(valeur_NotePilote) from possedenotepilote inner join (entreprise where entreprise.ID = possedenotepilote.ID_entreprise) where entreprise_nom = :entreprise');
            $req->execute(array('entreprise' => $entreprise));
            return $req;
        }
    }
?>