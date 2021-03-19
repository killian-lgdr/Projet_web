<?php
    class Manager
    {
        protected function dbConnect(){
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            return $db;
        }
    }
?>