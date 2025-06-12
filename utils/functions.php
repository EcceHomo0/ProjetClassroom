<?php

//Fonction de nettoyage des données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

// Fonction de connexion à la base de données
function connect($host,$dbname,$username,$password){
    return new PDO("mysql:host=$host;dbname=$dbname",$username,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}

?>