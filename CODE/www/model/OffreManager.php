<?php
    require_once("model/Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres(){
            $db = $this->dbConnect();
            $req = $db->query('Select nom, duree, salaire, date, nombreplace, localisation.nom, entreprise.nom competence.nom from offre inner join (localisation where offre.ID_localisation=localisation.ID_localisation) inner Join (entreprise where offre.ID_entreprise = entreprise.ID_entreprise) inner join((requiert where offre.Id_offre = requiert.ID_offre) inner join competence where requiert.ID_competence = competence.ID_competence)');
            return $req;
        }
    }
?>