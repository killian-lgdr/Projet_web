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
        public function getEntreprise($entreprise){
            $db = $this->dbConnect();
            $req = $db->prepare('Select entreprise.ID_Entreprise, nom_Entreprise, SecteurActivité, nbStagiaireCesi, localisation.nom_Localisation, ROUND(AVG(valeur_NotePilote)) AS noteP, ROUND(AVG(valeur_NoteEtudiant)) AS noteE 
            from entreprise 
            LEFT join localisation on entreprise.ID_Localisation=localisation.ID_Localisation 
            LEFT join possedenotepilote on entreprise.ID_Entreprise=possedenotepilote.ID_Entreprise 
            LEFT join possedenoteetudiant on entreprise.ID_Entreprise=possedenoteetudiant.ID_Entreprise 
            
            
            GROUP BY entreprise.ID_Entreprise');
            $req->execute(array('Entreprise' => $entreprise));
            return $req;
        }
    }
?>
