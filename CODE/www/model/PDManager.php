<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
        public function getDelegue($nomdel, $prenomdel)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Delegue, prenom_Delegue, localisation.nom_localisation from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation where delegue.nom_Delegue = :nomdelegue AND delegue.prenom_Delegue = :prenomdelegue ;');
                $req->execute(array('nomdelegue' => $nomdel, 'prenomdelegue' => $prenomdel));
                return $req;
        }
        public function getPilote($nompil, $prenompil)
        {
                $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Pilote, prenom_Pilote, localisation.nom_localisation, GROUP_CONCAT(niveauetudes.promotion SEPARATOR \',\') as promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_Localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_Pilote = :nompilote AND pilote.prenom_Pilote = :prenompilote ;');
                $req->execute(array('nompilote' => $nompil, 'prenompilote' => $prenompil));
                return $req;
        } 
        
        public function addDelegue($nomdel, $prenomdel, $villedel, $mdpdel, $confmdpdel)
        {
            $db = $this->dbConnect();
                $req = $db->prepare('SELECT nom_Delegue, prenom_Delegue, localisation.nom_localisation from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation where delegue.nom_Delegue = :nomdelegue AND delegue.prenom_Delegue = :prenomdelegue ;');
                $req->execute(array('nomdelegue' => $nomdel, 'prenomdelegue' => $prenomdel, 'ville' => $villedel));
                return $req;
        }

    }
?>