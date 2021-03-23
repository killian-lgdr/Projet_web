<?php
    require_once("Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres(){
            $db = $this->dbConnect();
            $req = $db->query('Select nom_Offre, duree, salaire, date, nombreplace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ", ") AS nom_Competence, promotion, offre.ID_Offre from offre inner join localisation on offre.ID_localisation=localisation.ID_localisation inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise inner join requiert on offre.Id_offre = requiert.ID_offre inner join competence on requiert.ID_competence = competence.ID_competence inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes GROUP BY offre.ID_Offre ');
            return $req;
        }
        public function getAllEntreprise(){
            $db = $this->dbConnect();
            $req = $db->query('SELECT DISTINCT nom_Entreprise FROM entreprise');
            return $req;
        }
        public function getOffre($domaine, $ville, $date, $nivetudes, $dureemin, $dureemax, $salaire, $entreprise){
            $db = $this->dbConnect();
            $req = $db->prepare('Select nom_Offre, duree, salaire, date, nombrePlace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ", ") AS nom_Competence, promotion, offre.ID_Offre from offre 
                                inner join localisation on offre.ID_localisation=localisation.ID_localisation 
                                inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise 
                                inner join requiert on offre.Id_offre = requiert.ID_offre 
                                inner join competence on requiert.ID_competence = competence.ID_competence 
                                inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes 

                                WHERE nom_Competence = IF( :domaine =\'\', nom_Competence, :domaine2 ) 
                                AND SUBSTRING_INDEX(`nom_Localisation`,\'0 \',-1) = IF( :ville =\'\', SUBSTRING_INDEX(`nom_Localisation`,\'0 \',-1), :ville2 )
                                AND date >= IF( :date =\'\', date, :date2 )
                                AND promotion IN(
                                    SUBSTRING_INDEX(IF(:nivetudes = \'\', promotion, :nivetudes2), \',\', 1),
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(IF(:nivetudes3 = \'\', promotion, :nivetudes4), \',\', 2), \',\', -1),
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(IF(:nivetudes5 = \'\', promotion, :nivetudes6), \',\', 3), \',\', -1),
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(IF(:nivetudes7 = \'\', promotion, :nivetudes8), \',\', 4), \',\', -1),
                                    SUBSTRING_INDEX(IF(:nivetudes9 = \'\', promotion, :nivetudes10), \',\', -1)
                                    )
                                AND duree >= IF( :dureemin =\'\', duree, :dureemin2 )
                                AND duree <= IF( :dureemax =\'\', duree, :dureemax2 )
                                AND salaire >= IF( :salaire =\'\', salaire, :salaire2 )
                                AND nom_Entreprise = IF( :entreprise =\'\', nom_Entreprise, :entreprise2 )

                                GROUP BY offre.ID_Offre ');
            $req->execute(array('domaine' => $domaine,
                                'domaine2' => $domaine,
                                'ville' => $ville,
                                'ville2' => $ville,
                                'date' => $date,
                                'date2' => $date,
                                'nivetudes' => $nivetudes,
                                'nivetudes2' => $nivetudes,
                                'nivetudes3' => $nivetudes,
                                'nivetudes4' => $nivetudes,
                                'nivetudes5' => $nivetudes,
                                'nivetudes6' => $nivetudes,
                                'nivetudes7' => $nivetudes,
                                'nivetudes8' => $nivetudes,
                                'nivetudes9' => $nivetudes,
                                'nivetudes10' => $nivetudes,
                                'dureemin' => $dureemin,
                                'dureemin2' => $dureemin,
                                'dureemax' => $dureemax,
                                'dureemax2' => $dureemax,
                                'salaire' => $salaire,
                                'salaire2' => $salaire,
                                'entreprise' => $entreprise,
                                'entreprise2' => $entreprise
                                ));
            return $req;
        }
    }
?>