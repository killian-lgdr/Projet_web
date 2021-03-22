<?php
    require_once("Manager.php");
    class PDManager extends Manager
    {
        public function getDelegue($nom, $prenom){
            $db = $this->dbConnect();
            $req = $db->query('Select nom_Offre, duree, salaire, date, nombreplace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ", ") AS nom_Competence, promotion, offre.ID_Offre from offre inner join localisation on offre.ID_localisation=localisation.ID_localisation inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise inner join requiert on offre.Id_offre = requiert.ID_offre inner join competence on requiert.ID_competence = competence.ID_competence inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes GROUP BY offre.ID_Offre ');
            return $req;
        }
        public function getPilote($nom, $prenom){
            $db = $this->dbConnect();
            $req = $db->query('SELECT nom_pilote, prenom_pilote, localisation.nom_localisation, niveauetudes.promotion from pilote inner join localisation on pilote.ID_Localisation = localisation.ID_localisation inner join enseigne_a on pilote.ID_Pilote=enseigne_a.ID_Pilote inner join niveauetudes on enseigne_a.ID_NiveauEtudes=niveauetudes.ID_NiveauEtudes where pilote.nom_pilote = '.$nom.' AND pilote.prenom_pilote = '.$prenom);
            return $req;
        }        

    }
?>