<?php
function chargerClasse($classname){
    require $classname.'.php';
    require "cv.php";   
}
spl_autoload_register('chargerClasse');
$con=new PDO('mysql:host=localhost;dbname=user','root','');
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$id=$_GET["id_cv"];
$manager=new manager($con);
$row=$manager->recuperer($id);
$array=$manager->recuperer_exp($id);
$array1=$manager->recuperer_dip($id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      html,
body {
    padding: 0;
    margin: 0;
    font-family: 'Lato', sans-serif;
}

.landing-page {
    height: 100vh;
    width: 84vw;
    margin-right: 8vw;
    margin-left: 8vw;
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.landing-text {
    height: 90%;
    width: 46%;
    margin: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.landing-images {
    height: 90%;
    width: 54%;
    display: flex;
    justify-content: space-around;

}

.landing-title {
    font-size: 2.4rem;
    margin: 0;
}

.landing-paragraph {
    font-size: 1.4rem;
    line-height: 2rem;
}

.form-btn {
    color: white;
    text-decoration: none;
    background-color: rgb(0, 0, 0);
    width: fit-content;
    padding: 12px 15px;
    border-radius: 10px;
    margin:30px 0 ;
}

.image1 {
    height: 80vh;
    width: 44%;
    align-self: flex-end;
}

.image1>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 200px;
    border: 1px solid rgb(224, 224, 224);
}

.image2 {
    height: 80vh;
    width: 44%;
}

.image2>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 200px;
    border: 1px solid rgb(224, 224, 224);
}

.form-page {
    width: 100%;
    height: 100vh;
    display: flex;
    overflow-y: hidden;
}

.personal-info {
    width: calc(30% - 60px);
    background-color: #53a8b6;
    max-height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 40px 30px;
}

.other-info {
    width: calc(70% - 80px);
    height: 100vh;
    margin: 40px;
    display: flex;
    flex-direction: column;
    overflow-y: scroll;
}

.other-info::-webkit-scrollbar {
    display: none;
}

.other-info-title {
    font-size: 2rem;
}

.subsection-title {
    font-size: 1.2rem;
    font-weight: 600;
    padding: 20px 10px;
    border-top: 1px solid rgb(230, 230, 230);
}

.profile-image {
    height: 200px;
    width: 200px;
    background-color: white;
    border-radius: 50px;
    align-self: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    row-gap: 10px;
    font-size: .85rem;
    color: rgb(96, 96, 96);
    margin-bottom: 20px;
    font-weight: 600;
}


.personal-info>label {
    color: rgba(255, 255, 255, 0.9);
    font-size: .9rem;
    margin-top: 15px;
    font-weight: 600;
    margin-left: 10px;
}

.personal-info>input {
    margin-top: 6px;
    border-radius: 12px;
    height: 50px;
    border: none;
    padding: 0 10px;
    font-size: .9rem;
    font-weight: 600;
    color: rgb(80, 80, 80);
}

.form-section {
    display: flex;
    flex-direction: column;
    margin-bottom: 40px;
}

.other-info-label {
    font-size: .9rem;
    margin-top: 15px;
    font-weight: 600;
    margin-left: 10px;
}

.other-info-input {
    margin-top: 6px;
    border-radius: 12px;
    height: 50px;
    border: 1px solid rgb(230, 230, 230);
    padding: 0 10px;
    font-size: .9rem;
    font-weight: 600;
    background-color: rgb(240, 240, 240);
}

.other-info-textarea {
    margin-top: 6px;
    border-radius: 12px;
    height: 100px;
    border: 1px solid rgb(230, 230, 230);
    padding: 0 10px;
    font-size: .9rem;
    font-weight: 600;
    background-color: rgb(240, 240, 240);
    resize: none;
    padding-top: 10px;
}

.two-inputs-perline {
    display: flex;
    justify-content: space-between;
}

.two-inputs-perline>div {
    display: flex;
    flex-direction: column;
    width: 49%;
}

.select-container {
    width: 200px;
    position: relative;
    display: inline-block;
}
.submit-btn {
    color: white;
    text-decoration: none;
    background-color: rgb(0, 0, 0);
    width: fit-content;
    padding: 12px 15px;
    border-radius: 10px;
    margin:30px 0 ;
}
.submit-btn1 {
    color: rgb(0, 0, 0);
    text-decoration: none;
    background-color: white;
    width: fit-content;
    padding: 12px 15px;
    border-radius: 10px;
    margin:30px 0 ;
}

span {
    font-size: .9rem;
    margin-top: 15px;
    margin-left: 10px;
}

.personal-info > span {
    font-size: .9rem;
    margin-top: 15px;
    margin-left: 10px;
    color: white;
}

.strong{
    font-weight: 600;
    background-color: rgb(255, 255, 255);
}

.langage-badge{
    background-color: rgb(255, 255, 255);
    padding: 8px 15px;
    border-radius: 4px;
    color: white;
    background-color: #2E8BC0;
}
display-langues{
    font-size: 5px;
}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <title>CV Information</title>
  </head>
  <body>
    <div class="form-page">
      <div class="personal-info">
        <div class="profile-image" id="image-container"></div>
        <span for="" id="display-nom"><b>Nom complet :</b> <?php echo $row['nometprenom']; ?></span>
        <span for="" id="display-profession"><b>Date de naissance :</b> <?php echo $row['datenais']; ?></span>
        <span for="" id="display-email"><b>Email :</b><?php echo $row['email']; ?></span>
        <span for="" id="display-telephone"><b>Telphone :</b><?php echo $row['tel']; ?></span><br><br><br><br><br><br><br><br>
        <br><br><br><br><br>
        <span>
        <button onclick="downloadPDF()" id='b1'>Télécharger CV PDF</button>
        
    
        <script>
function downloadPDF() {
    var container = document.querySelector('html');
    var b1 = document.getElementById("b1");
    b1.style.display = "none";
    html2pdf(container);
}
</script>
        </span>
      </div>
      <div class="other-info">
        <h1 class="other-info-title">Votre CV</h1>
        <div class="form-section">
        <div class="subsection-title">Profil :</div>
          <span for="" class="other-info-span" id="display-description-ecole"><span class="strong" ><br><?php echo $row['apropos']?></span></span>
          <div class="subsection-title">Experiences professionnelles :</div>
          <span for="" class="other-info-span" id="display-ecole"><span class="strong" ><?php
            "<table>
            <th><td>experience</td><td>date de l'experience</td></th>";
              foreach($array as $valeur){
                echo "<tr><td>".$valeur['exp']."</td> <td>".$valeur['date_exp']."</td></tr>  <br>  "; }
                echo "</table>"; ?></span></span>
                <div class="subsection-title">Diplome :</div>
                <span for="" class="other-info-span" id="display-diplome"><span class="strong" ><?php
            "<table>
            <th><td>diplome</td><td>date de diplome</td></th>";
              foreach($array1 as $valeur){
                echo "<tr><td>".$valeur['dip']."</td> <td>".$valeur['date_dip']."</td></tr>  <br>  ";}
                echo "</table>"; ?></span></span>
          
        </div>
        <div class="form-section">
          <div class="subsection-title">Langues<br>
            <div class="display-langues" style="margin-top: 20px;">
              <div >ARABE</div><br>
              <div><?php echo $row['arabe']."  /5";?></div><br>
              <div>FRANCAIS</div><br>
              <div><?php echo $row['francais']."  /5";?></div><br>
              <div>ANGLAIS</div><br>
              <div><?php echo $row['anglais']."  /5";?></div><br>
            </div>
          </div>
          <div id="display-langues"></div>
        </div>
      </div>
    </div>
    <script src="display.js"></script>
  </body>
</html>
