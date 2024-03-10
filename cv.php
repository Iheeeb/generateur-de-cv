<?php 

class cv {
    //les attributs de la classe cv
    protected $np ;
    protected $date;
    protected $adr;
    protected $apr ;
    protected $ar ;
    protected $fr ;
    protected $ang ;
    protected $email ;
    protected $tel ;
    protected $fb ;
    protected $ig ;
    protected $li ;
    protected $photo ;
    protected $lep ;
    protected $lde ;
    protected $ld;
    protected $ldd;
    protected $realisateur;


    //constructeur de la classe cv
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


    //getters et setters sur les attributs
    public function setNp($np){
        $this->np=$np;
    }
    public function setDate($date){
        $this->date=$date;
    }
    public function setAdr($adr){
        $this->adr=$adr;
    }
    public function setApr($apr){
        $this->apr=$apr;
    }
    public function setAr($ar){
        $this->ar=$ar;
    }
    public function setFr($fr){
        $this->fr=$fr;
    }
    public function setAng($ang){
        $this->ang=$ang;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setTel($tel){
        $this->tel=$tel;
    }
    public function setFb($fb){
        $this->fb=$fb;
    }
    public function setIg($ig){
        $this->ig=$ig;
    }
    public function setLi($li){
        $this->li=$li;
    }
    public function setPhoto($photo){
        $this->photo=$photo;
    }
    public function getNp(){
        return $this->np;
    }
    public function getDate(){
        return $this->date;
    }
    public function getAdr(){
        return $this->adr;
    }
    public function getApr(){
        return $this->apr;
    }
    public function getAr(){
        return $this->ar;
    }
    public function getFr(){
        return $this->fr;
    }
    public function getAng(){
        return $this->ang;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTel(){
        return $this->tel;
    }
    public function getFb(){
        return $this->fb;
    }
    public function getIg(){
        return $this->ig;
    }
    public function getLi(){
        return $this->li;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function setLep($lep){
        $this->lep=$lep;
    }
    public function getLep(){
        return $this->lep;
    }
    public function setLde($lde){
        $this->lde=$lde;
    }
    public function getLde(){
        return $this->lde;
    }
    public function setLd($ld){
        $this->ld=$ld;
    }
    public function getLd(){
        return $this->ld;
    }
    public function setLdd($ldd){
        $this->ldd=$ldd;
    }
    public function getLdd(){
        return $this->ldd;
    }
    public function setRealisateur($realisateur){
        $this->realisateur=$realisateur;
    }
    public function getRealisateur(){
        return $this->realisateur;
    }
    
}



?>