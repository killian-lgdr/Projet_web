<?php
    require_once("Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres($depart, $OffreParPage){
            $db = $this->dbConnect();
            $req = $db->query("Select nom_Offre, duree, salaire, date, nombreplace, nom_Localisation, nom_Entreprise, GROUP_CONCAT(`nom_Competence` SEPARATOR ', ') AS nom_Competence, promotion, offre.ID_Offre from offre inner join localisation on offre.ID_localisation=localisation.ID_localisation inner Join entreprise on offre.ID_entreprise = entreprise.ID_entreprise inner join requiert on offre.Id_offre = requiert.ID_offre inner join competence on requiert.ID_competence = competence.ID_competence inner join niveauetudes on niveauetudes.ID_NiveauEtudes = offre.ID_NiveauEtudes GROUP BY offre.ID_Offre  DESC LIMIT " . $depart . " , " . $OffreParPage .";");
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

                                GROUP BY offre.ID_Offre');
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

        public function createOffre($offre, $domaine, $duree, $adresse, $salaire, $nivetudes, $date, $places, $entreprise){

            $db = $this->dbConnect();
            $req1 = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req1->execute(array('ville1' => $adresse, 'ville2' => $adresse));

            $req2 = $db->prepare("Insert into offre(`nom_Offre`, `duree`, `salaire`, `date`, `nombrePlace`, `ID_Localisation`, `ID_Entreprise`, `ID_NiveauEtudes`) 
                                SELECT :offre, :duree, :salaire, :date, :places, 
                                (SELECT ID_Localisation FROM localisation WHERE localisation.nom_Localisation = :adresse),
                                (SELECT ID_Entreprise FROM entreprise WHERE entreprise.nom_Entreprise = :entreprise),
                                (SELECT ID_NiveauEtudes FROM niveauetudes WHERE niveauetudes.promotion = :nivetudes)
                                WHERE NOT EXISTS (select nom_Offre FROM offre where offre.nom_Offre = :offre1)");

            $req2->execute(array('offre'=>$offre,
                                'duree'=>$duree,
                                'salaire'=>$salaire,
                                'date'=>$date,
                                'places'=>$places,
                                'adresse'=>$adresse,
                                'entreprise'=>$entreprise,
                                'nivetudes'=>$nivetudes,
                                'offre1'=>$offre
                                ));
            $req3 = $db->prepare('Insert into competence (nom_Competence) Select :domaine where not exists(SELECT nom_Competence from competence where nom_Competence = :domaine2 ) ;');
            $req3->execute(array('domaine'=>$domaine, 'domaine2'=>$domaine));

            $req4 = $db->prepare('DELETE FROM requiert WHERE ID_Offre = (SELECT ID_Offre FROM offre WHERE nom_Offre = :nomOffre);');
            $req4->execute(array('nomOffre' => $offre));

            $req5 = $db->prepare('INSERT INTO `requiert`(`ID_Offre`, `ID_Competence`) 
                                VALUES ((SELECT ID_Offre FROM offre WHERE nom_Offre = :offre),
                                (SELECT ID_Competence from competence where nom_Competence = :domaine))');
            $req5->execute(array('offre'=>$offre, 'domaine'=>$domaine));
        }

        public function deleteOffre($offre){
            $db = $this->dbConnect();

            $req = $db->prepare('DELETE FROM requiert WHERE ID_Offre = (SELECT ID_Offre FROM offre WHERE nom_Offre = :offre)');
            $req->execute(array('offre' => $offre));

            $req1 = $db->prepare('DELETE FROM offre WHERE nom_Offre = :offre');
            $req1->execute(array('offre' => $offre));
        }

        public function rechercheOffre($offre)
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT nom_Offre, duree, salaire, nombrePlace, `date`, entreprise.nom_Entreprise, localisation.nom_Localisation, niveauetudes.promotion, competence.nom_Competence 
                                FROM offre
                                INNER JOIN localisation ON offre.ID_Localisation = localisation.ID_Localisation
                                INNER JOIN entreprise ON offre.ID_Entreprise = entreprise.ID_Entreprise
                                INNER JOIN niveauetudes ON offre.ID_NiveauEtudes = niveauetudes.ID_NiveauEtudes
                                INNER JOIN requiert ON offre.ID_Offre = requiert.ID_Offre
                                INNER JOIN competence ON requiert.ID_Competence = competence.ID_Competence
                                WHERE offre.nom_Offre = :offre');
            $req->execute(array('offre'=>$offre));
            return $req;                
        }
        public function updateOffre($ville, $domaine, $offre, $duree, $salaire, $nivetudes, $date, $places, $entreprise)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("Insert into localisation (nom_Localisation) Select :ville1 where not exists(SELECT nom_Localisation from localisation where nom_Localisation = :ville2 ) ;");
            $req->execute(array('ville1' => $ville, 'ville2' => $ville));
            $req1 = $db->prepare('Insert into competence (nom_Competence) Select :domaine where not exists(SELECT nom_Competence from competence where nom_Competence = :domaine2 ) ;');
            $req1->execute(array('domaine'=>$domaine, 'domaine2'=>$domaine));
            $req2 = $db->prepare('DELETE FROM requiert WHERE ID_Offre = (SELECT ID_Offre FROM offre WHERE nom_Offre = :offre)');
            $req2 ->execute(array('offre' => $offre));
            $req3 = $db->prepare('INSERT INTO `requiert`(`ID_Offre`, `ID_Competence`) 
                                VALUES ((SELECT ID_Offre FROM offre WHERE nom_Offre = :offre),
                                (SELECT ID_Competence from competence where nom_Competence = :domaine))');
            $req3 ->execute(array('offre'=>$offre, 'domaine'=>$domaine));
            $req4 = $db->prepare('UPDATE offre SET duree=:duree, salaire=:salaire, `date`=:dateD, nombrePlace=:nbPlace,ID_Localisation=(SELECT ID_Localisation from localisation where nom_Localisation=:ville),ID_Entreprise=(SELECT ID_Entreprise from entreprise where nom_Entreprise=:Entreprise),ID_NiveauEtudes=(SELECT ID_NiveauEtudes from niveauetudes where promotion=:promotion) WHERE nom_Offre=:offre');
            $req4 ->execute(array('offre' => $offre, 'duree'=>$duree, 'salaire'=>$salaire, 'dateD'=>$date, 'nbPlace'=>$places, 'ville'=>$ville, 'Entreprise'=>$entreprise, 'promotion'=>$nivetudes));
            return $req;                
        }
        public function postulerOffre($idOffre)
        {
            $db = $this->dbConnect();
            $req = $db->query('delete from a_postule where ID_Etudiant = (select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\') AND ID_Offre = ' . $idOffre);
            $req = $db->query('insert into a_postule(ID_Etudiant, ID_Offre, Etat) VALUES ((select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'), (' . $idOffre . '), 1)');
            return $req;
        }
        public function wishlistOffre($idOffre)
        {
            $db = $this->dbConnect();
            $req = $db->query('delete from a_wishlist where ID_Etudiant = (select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\') AND ID_Offre = ' . $idOffre);
            $req = $db->query('insert into a_wishlist(ID_Offre, ID_Etudiant) VALUES (' . $idOffre . ', (select ID_Etudiant from etudiant WHERE nom_Etudiant =\'' . strtok($_COOKIE['userName'], '.') . '\' AND prenom_Etudiant =\'' . substr(strrchr($_COOKIE['userName'], "."), 1) . '\'))');
            return $req;
        }

        public function totalOffre()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT ID_Offre FROM offre"); 
            return $req;
        }
    }
?>