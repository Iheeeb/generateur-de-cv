<?php
//chargement des fichier où il existe les classe manager et cv
function chargerClasse($classname){
    require "manager".'.php';
    require "user.php";   
}
spl_autoload_register('chargerClasse');

//connexion
$con=new PDO('mysql:host=localhost;dbname=user','root','');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

//creation d'un manager 
$manager=new manager($con);

//creation d'un utilisateur et appel de la methode chercheruser du classe manager
if (isset($_POST["nu"]) && isset($_POST["password"]) ){
    $user=new user(array('nu' =>$_POST["nu"],'password'=>$_POST["password"]));
    $manager->chercheruser($user);
}


?>