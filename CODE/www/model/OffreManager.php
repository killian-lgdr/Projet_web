<?php
    require_once("Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres(){
            $db = $this->dbConnect();
            $req = $db->query('Select offre.nom, duree, salaire, date, nombreplace, localisation.nom, entreprise.nom, competence.nom from offre 
            inner join localisation on offre.ID_localisation=localisation.ID_localisation 
            inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise
            inner join requiert on offre.Id_offre = requiert.ID_offre
            inner join competence on requiert.ID_competence = competence.ID_competence');
            return $req;
        }
    }
?>