<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
        public function getDelegue()
        {
            if(isset($_POST['nom_del']) && isset($_POST['prenom_del']))
            {
                $db = $this->dbConnect();
                $req = $db->query('SELECT nom_delegue, prenom_delegues, localisation.nom_localisation from delegue inner join localisation on delegue.ID_Localisation = localisation.ID_localisation where pilote.nom_pilote = '.$_POST['nom_del'].' AND pilote.prenom_pilote = '.$_POST['prenom_del']);
                return $req;
            }
        }
        public function getPilote()
        {
            if(isset($_POST ['nom_pil']) && isset($_POST['prenom_pil']))
            {
                $db = $this->dbConnect();
                $req = $db->query('SELECT nom_pilote, prenom_pilote, localisation.nom_localisation, niveauetudes.promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_pilote = '.$_POST['nom_pil'].' AND pilote.prenom_pilote = '.$_POST['prenom_pil']);
                return $req;
            }
        }        

    }
?>