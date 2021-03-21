<?php
    require_once("Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres(){
            $db = $this->dbConnect();
            $req = $db->query('Select nom_Offre, duree, salaire, date, nombreplace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ", ") AS nom_Competence, promotion from offre inner join localisation on offre.ID_localisation=localisation.ID_localisation inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise inner join requiert on offre.Id_offre = requiert.ID_offre inner join competence on requiert.ID_competence = competence.ID_competence inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes GROUP BY offre.ID_Offre ');
            return $req;
        }
    }
?>