<?php
    require_once("model/Manager.php");

    class OffreManager extends Manager
    {
        public function getAllOffres(){
            $db = $this->dbConnect();
            $req = $db->query('requete')
        }
    }
?>