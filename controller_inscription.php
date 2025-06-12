<?php

    session_start();

    include './model/model_user.php';
    include 'env.php';

    $user = new User($host_name,$db_name,$user_name,$password);

    if(isset($_POST['submitInscription']))
        {
            if (isset($_POST['firstname']) && !empty($_POST['firstname'])  &&  isset($_POST['lastname']) && !empty($_POST['lastname'])  && isset($_POST['email'])  &&  !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify']))
            {
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {   
                    if($_POST['password'] === $_POST['passwordVerify'])
                    {
                        $firstname=sanitize($_POST['firstname']);
                        $lastname=sanitize($_POST['lastname']);
                        $email=sanitize($_POST['email']);
                        $password=sanitize($_POST['password']);
                        $passwordVerify = sanitize($_POST['passwordVerify']);
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $user -> setFirstname($firstname)  -> setLastname($lastname)  -> setEmail($email) -> setPassword($password);
                        
                        $data = $user -> findUserByEmail($email);

                        if (empty($data))
                        {   
                            $message = $user -> addUser();
                        }
                        else{$message = 'Cette adresse e-mail est déjà enregistrée';}
                    }  
                    else{$message = 'Les mots de passe ne correspondent pas';}
                }
                else{$message = "L'e-mail n'est pas au bon format";}
            }
            else{$message = "Veuillez remplir tous les champs";}
        }

    include './view/view_inscription.php';

?>