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
        public function getPilote()
        {
                $db = $this->dbConnect();
                $req = $db->query('SELECT nom_pilote, prenom_pilote, localisation.nom_localisation, niveauetudes.promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_pilote = "'.$_POST['nom_pil'].'" AND pilote.prenom_pilote = "'.$_POST['prenom_pil'].'";');
                return $req;
        }        

    }
?>