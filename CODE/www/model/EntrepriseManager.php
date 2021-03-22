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
        public function getEntreprise($entreprise){
            $db = $this->dbConnect();
            $req = $db->prepare('Select nom_Entreprise, GROUP_CONCAT(SecteurActivité, SEPARATOR ", "), nbStagiaireCesi, localisation.nom_Localisation from entreprise
                                inner join localisation on entreprise.ID_localisation=localisation.ID_localisation 
                                WHERE nom_Entreprise = :entreprise
                                GROUP BY entreprise.ID_Entreprise ');
            $req->execute(array('Entreprise' => $entreprise));
            return $req;
        }
    }
?>