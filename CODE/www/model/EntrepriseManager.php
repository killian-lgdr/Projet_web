<?php
    require_once("Manager.php");

    class EntrepriseManager extends Manager
    {
        public function getAllEntreprise(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT DISTINCT nom_Entreprise FROM entreprise');
            return $req;
        }
        public function getEntreprise($domaine, $ville){
            $db = $this->dbConnect();
            $req = $db->prepare('Select nom_Offre, duree, salaire, date, nombreplace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ", ") AS nom_Competence, promotion, offre.ID_Offre from offre 
                                inner join localisation on offre.ID_localisation=localisation.ID_localisation 
                                inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise 
                                inner join requiert on offre.Id_offre = requiert.ID_offre 
                                inner join competence on requiert.ID_competence = competence.ID_competence 
                                inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes 

                                WHERE nom_Competence = :domaine AND SUBSTRING_INDEX(`nom_Localisation`,\'0 \',-1) = :ville

                                GROUP BY offre.ID_Offre ');
            $req->execute(array('domaine' => $domaine,
                                'ville' => $ville));
            return $req;
        }
    }
?>