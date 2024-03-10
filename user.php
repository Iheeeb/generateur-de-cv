<?php 
class user {
    //les attributs de la classe user
    protected $nu ;
    protected $password;

    //constructeur de la classse user
    public function __construct (array $donnees){
        $this->hydrate($donnees);
    }
    public function hydrate (array $donnees){
        foreach($donnees as $key => $value){
            $method='set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }


    //getters et setters des attributs
    public function setNu($nu){
        $this->nu=$nu;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    public function getnu(){
        return $this->nu;
    }
    public function getpassword(){
        return $this->password;
    }
}
?>
