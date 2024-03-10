<?php
//chargement du fichier où il existe les classes manager et cv
function chargerClasse($classname){
    require "manager".'.php';
    require "cv.php";   
}
spl_autoload_register('chargerClasse');

//connexion
$con=new PDO('mysql:host=localhost;dbname=user','root','');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

//creation d'un manager
$manager=new manager($con);

//recuperation du username du lien url
$realisateur = $_GET['username'];

//creation d'un cv 1
if (isset($_POST['envoyer'])){
    $donnees = array (
        'np' =>$_POST["np"],
        'date'=>$_POST["dn"],
        'adr' =>$_POST["adr"],
        'apr' =>$_POST["apr"],
        'ar' =>$_POST["ar"],
        'fr' =>$_POST["fr"],
        'ang' =>$_POST["ang"],
        'email' =>$_POST["email"],
        'tel' =>$_POST["tel"],
        'fb' =>$_POST["fb"],
        'ig' =>$_POST["ig"],
        'li' =>$_POST["li"],
        'photo' =>$_POST["photo"],
        'realisateur'=>$realisateur
    );
    $cv=new cv($donnees);
    
//creation d'un cv 2
        $exp = array (
            'lep'=> $_POST['lep'],
            'lde'=> $_POST['lde']
        );
        $liste1 = new cv($exp);
   
//creation d'un cv 3
    $dip = array (
        'ld'=> $_POST['ld'],
        'ldd'=> $_POST['ldd']
    );
    $liste2 = new cv($dip);


//appel de la methode ajouter de la classe manager
$manager->ajouter ($cv,$liste1,$liste2);


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <body>
    <form action="" method="post">
    <div class="form-page">
      <div class="personal-info">
        <div class="profile-image" id="image-container" >
          Choisir une photo de cv
          <img src="./upload.png" alt="" height="15" />
        </div>
        <input type="file" id="image" accept="image/*" style="display: none;">
        <label for="">Nom complet :</label>
        <input type="text" name="np" id="np" required>
        <label for="">Date de naissance :</label>
        <input type="date" name="dn" id="dn" required>
        <label for="adr">Adresse :</label>
        <input type="text" name="adr" id="adr">
        <label for="">Email :</label>
        <input type="email" name="email" id="email" placeholder="username@domaine.com" required>
        <label for="">Telphone :</label>
        <input type="text" name="tel" id="tel" required>
        <label for="li">LinkedIn :</label>
        <input type="text" name="li" id="li" required>
        <label for="ig">Instagram :</label>
        <input type="text" name="ig" id="ig" required>
        <label for="fb">Facebook :</label>
        <input type="text" name="fb" id="fb" required>
      </div>
      <div class="other-info">
        <h1 class="other-info-title">Créez votre CV</h1>
        <div class="form-section">
        <label for="" class="other-info-label">A propos :</label>
          <textarea
            type="text"
            class="other-info-textarea"
            id="description-ecole"
          ></textarea>
          <br><br>
          <div class="subsection-title">Éducation</div>
          <div class="two-inputs-perline">
            <div>
              <label for="" class="other-info-label">Diplome :</label>
              <input type="text" name="dip" class="other-info-input" id="dip" placeholder="saisir un diplome ici ">
            </div>
            <div>
              <label for="" class="other-info-label">Date diplome :</label>
              <input type="date" id="ddip" class="other-info-input" name="ddip">
            </div>
            
          </div>
          <br><br>
          <div class="two-inputs-perline">
            <div>
              <textarea name="ld" id = "ld" class="other-info-input" readonly></textarea>     
            </div>
            <div>
              <textarea name="ldd" id = "ldd" class="other-info-input" readonly></textarea>
            </div>
          </div>
          <button type="button" class="submit-btn1" onclick="contdip()">Ajouter</button>

          <div class="form-section">
            <div class="subsection-title">Experiences professionnelles :</div>
            <div class="two-inputs-perline">
              <div>
                <input type="text" name="ep" id="ep" class="other-info-input" placeholder="saisir une Expérience professionnelle ici">
              </div>
              <div>
                <input type="date" id="dep" class="other-info-input">
              </div>
            </div>
            <br><br>
            <div class="two-inputs-perline">
            <div>
              <textarea name="lep" id = "lep" class="other-info-input" readonly></textarea>     
            </div>
            <div>
              <textarea name="lde" id = "lde" class="other-info-input" readonly></textarea>
            </div>
          </div>
            <button type="button" class="submit-btn1" onclick="contexp()" name = "ajouter">Ajouter</button>

          
        </div>
        
        <div class="form-section">
          <div class="subsection-title">Langues</div>
          <label for="ar" class="other-info-label">ARABE :</label>
          <select name="ar" id="ar" class="other-info-input">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="fr" class="other-info-label">FRANCAIS :</label>
        <select name="fr" id="fr" class="other-info-input">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
      </select>
      <label for="ang" class="other-info-label">ANGLAIS :</label>
      <select name="ang" id="ang" class="other-info-input">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
          <button type="submit" class="submit-btn" id="submit" name="envoyer">Enregistrer </button>
        </div>
      </div>
    </div>
    <script>

      function contexp() {

          var exp = document.getElementById('ep').value;
          var dexp = document.getElementById('dep').value;

          if (exp == "") {
              alert("champ d'experiences professionnelles obligatoire");
          }
          else {
              if (dexp == "") {
                  alert("champ de date d'experiences professionnelles obligatoire");


              }
              else {
                  document.getElementById('lep').value+=exp+"\n"; 
                  document.getElementById('lde').value+=dexp+"\n";  
                  document.getElementById('ep').value = "";
                  document.getElementById('dep').value = "";


              }
          }



      }
      function contdip() {
          var dip = document.getElementById('dip').value;
          var ddip = document.getElementById('ddip').value;

          if (dip == "") {
              alert("champ de diplome obligatoire");
          }
          else {
              if (ddip == "") {
                  alert("champ de date de diplome obligatoire");


              }
              else {
                  document.getElementById('ld').value+=dip+"\n"; 
                  document.getElementById('ldd').value+=ddip+"\n";  
                  document.getElementById('dip').value = "";
                  document.getElementById('ddip').value = "";


              }

          }

      }
  
  </script>
  </form>
  </body>
</html>
