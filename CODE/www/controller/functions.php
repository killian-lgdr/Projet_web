<?php
    function verif($val){
        if (isset($_POST[$val])){
            return $_POST[$val];
        }
        else{
            return '';
        }
    }

    function connectUser($userName, $password){
        $connectUserManager = new ConnectUserManager();
        $identifiants = ($connectUserManager->connectUser($userName))->fetch();
        
        if (!$identifiants)
        {
            return 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            $isPasswordCorrect = password_verify($password, $identifiants['mdp_Identifiant']);
            if ($isPasswordCorrect) {
                setcookie('droits', $identifiants['droits'], time() + 365*24*3600, null, null, false, true);
                setcookie('userName', $identifiants['nom_Identifiant'], time() + 365*24*3600, null, null, false, true);
                setcookie('password', $identifiants['mdp_Identifiant'], time() + 365*24*3600, null, null, false, true);
                return 'Vous êtes connecté !';
            }
            else {
                return 'Mauvais identifiant ou mot de passe !';
            }
        }
    }
?>