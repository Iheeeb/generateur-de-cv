<?php
function chargerClasse($classname){
    require "manager".'.php';
    require "user.php";   
}
spl_autoload_register('chargerClasse');
$con=new PDO('mysql:host=localhost;dbname=user','root','');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$manager=new manager($con);
if (isset($_POST["nu"]) && isset($_POST["password"]) ){
    $user=new user(array('nu' =>$_POST["nu"],'password'=>$_POST["password"]));
    $manager->ajouteruser ($user);
}


?>