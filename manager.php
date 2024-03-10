<?php
//connexion au base de données
require("connect.php");
$dsn="mysql: dbname=".base.";host=".serveur;
try {
    $conn=new PDO($dsn,user,pwd);
} catch (PDO_Exception $e) {
    printf( "echec de la connexion :%s\n",$e->getmessage());
    exit();
}



class manager{
    private $con;//attribut : objet pdo connecté au bd


    //constructeur
    public function __construct ($con){
        $this->setdb($con);
    }


    //methode permet d'ajouter un nouvelle utilisateur au base de données
    public function ajouteruser(user $user){
        $q = $this->con->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
        $q->bindValue(":username", $user->getNu());
        $q->bindValue(":password", $user->getPassword());
        $q->execute();
        if ($q) {
            header("Location: accueil.html");
        }else {
            echo 'errer';
        }

    }



    //methode qui verifie si les informations tapées sont existants dans la base de données ou non
    public function chercheruser(user $user){
        $q=$this->con->prepare('select * from user where username= :nu and password= :password');
        $q->bindValue(":nu",$user->getNu());
        $q->bindValue(":password",$user->getPassword());
        $q->execute();
        $result = $q->fetch(PDO::FETCH_ASSOC);
        if ($result['username']==$user->getNu() && $result['password']==$user->getPassword()){
            $username =  $user->getNu();
            header("Location: form.php?username=$username");
            exit;

        }
        else {
            header("Location: inscription.html");
            exit;
        }





    }


    //ajout d'un nouveau cv dans la base de données 
    public function ajouter(cv $cv , cv $liste1 ,cv $liste2){

        //table cv
        $q=$this->con->prepare('insert into cv values (null , :np , :date , :adr , :apr , :ar , :fr , :ang , :email , :tel , :fb , :ig , :li , :photo , :realisateur)');
        $q->bindValue(":np",$cv->getNp());
        $q->bindValue(":date",$cv->getDate());
        $q->bindValue(":adr",$cv->getAdr());
        $q->bindValue(":apr",$cv->getApr());
        $q->bindValue(":ar",$cv->getAr());
        $q->bindValue(":fr",$cv->getFr());
        $q->bindValue(":ang",$cv->getAng());
        $q->bindValue(":email",$cv->getEmail());
        $q->bindValue(":tel",$cv->getTel());
        $q->bindValue(":fb",$cv->getFb());
        $q->bindValue(":ig",$cv->getIg());
        $q->bindValue(":li",$cv->getLi());
        $q->bindValue(":photo",$cv->getPhoto());
        $q->bindValue(":realisateur",$cv->getRealisateur());

        $q->execute();

        //recuperation du numero du derniere enregistrement inserée dans la table cv
        $stmt =$this->con->prepare('select * from cv order by num_cv desc limit 1');
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $numcv = $row['num_cv'];
        
         //table experience
        $lep = $liste1->getLep();
        $lde = $liste1->getLde();
        while ($lep !== "" && $lde !== ""){
            $pos = strpos($lep, "\n");
            $substring = substr($lep, 0, $pos);
            $pos1 = strpos($lde, "\n");
            $substring1 = substr($lde, 0, $pos1); 
            $sql = "insert into experience   VALUES (null,$numcv , :lep, :lde)";
            $stmt =$this->con->prepare($sql);
            $stmt->bindParam(':lep', $substring);
            $stmt->bindParam(':lde', $substring1);
            $stmt->execute();
            $lde=substr($lde,$pos1+1);
            $lep=substr($lep,$pos+1);
        }

        //table diplome
        $ld = $liste2->getLd();
        $ldd = $liste2->getLdd();
        while ($ld !== "" && $ldd !== ""){
            $pos2 = strpos($ld, "\n");
            $substring2 = substr($ld, 0, $pos2);
            $pos3 = strpos($ldd, "\n");
            $substring3 = substr($ldd, 0, $pos3); 
            $sql = "insert into diplome   VALUES (null,$numcv , :ld, :ldd)";
            $stmt =$this->con->prepare($sql);
            $stmt->bindParam(':ld', $substring2);
            $stmt->bindParam(':ldd', $substring3);
            $stmt->execute();
            $ld=substr($ld,$pos2+1);
            $ldd=substr($ldd,$pos3+1);
        }
        header("Location: choix.php?id_cv=$numcv");
        exit;
    }

    //recuperation des informations du tableau cv liées au code cv donné
    public function recuperer(int $x){
        $q=$this->con->prepare("select * from cv where num_cv=$x");
        $q->execute();
        $row = $q->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    ////recuperation des informations du tableau experience liées au code cv donné
    public function recuperer_exp(int $x){
        $q=$this->con->query("select * from experience where num_cv=$x");
        return $q;
    }

    //recuperation des informations du tableau diplome liées au code cv donné
    public function recuperer_dip(int $x){
        $q=$this->con->query("select * from diplome where num_cv=$x");
        return $q;
    }

    //setter de l'attribut con
    public function setdb(PDO $con){
        $this->con=$con;
    }

}

?>