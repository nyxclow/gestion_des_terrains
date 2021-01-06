<?php 
    require 'functions.php';
    navbar();
?>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  width: 100%;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.body{
    padding: 50px;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<div class='body'>
  <?php
    if(isset($_GET['idB'])){
      $connexion = getConnection();
      $query = "SELECT id_Beneficier, nom, prenom, cin, telephone FROM beneficier WHERE id_Beneficier =".$_GET['idB'];
      $result = mysqli_query($connexion, $query);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $idBeneficier = $row[0];
      $nomBeneficier = $row[1];
      $prenomBeneficier = $row[2];
      $cinBeneficier = $row[3];
      $teleBeneficier = $row[4];
    }
    if(isset($_POST['modifierB'])){
      $idBeneficier = $_POST['idBeneficier'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $cin = $_POST['cin'];
      $telephone = $_POST['tele'];
  
      $connexion = getConnection();
      $query = "UPDATE beneficier SET nom='$nom',prenom='$prenom',cin='$cin',telephone='$telephone' WHERE id_Beneficier=".$idBeneficier;
      $exec = mysqli_query($connexion, $query);
      if ($exec)
        echo '<script type="text/javascript">
                alert("Beneficier ajouter avec succes!!!");
            </script>';
      else
        echo '<script type="text/javascript">
                alert("Probleme dans l\'ajout");
            </script>';
      header('Location: beneficier.php');
    }
  ?>
  <h3>Modifier Beneficier</h3>
  <div class="container">
      <form action="modifierBeneficier.php" method="POST">
      <div class="row">
              <div class="col-25">
              <label for="idBeneficier">Nom de Beneficier</label>
              </div>
              <div class="col-75">
              <input type="text" id="idBeneficier" value="<?php echo $idBeneficier; ?>" disabled>
              <input type="text" id="idBeneficier" name="idBeneficier" value="<?php echo $idBeneficier; ?>" hidden>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="nom">Nom de Beneficier</label>
              </div>
              <div class="col-75">
              <input type="text" id="nom" name="nom" value="<?php echo $nomBeneficier; ?>" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="prenom">Prenom de Beneficier</label>
              </div>
              <div class="col-75">
              <input type="text" id="prenom" name="prenom" value="<?php echo $prenomBeneficier; ?>" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="cin">CIN de Beneficier</label>
              </div>
              <div class="col-75">
              <input type="text" id="cin" name="cin" value="<?php echo $cinBeneficier; ?>" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="tele">Telephone de Beneficier</label>
              </div>
              <div class="col-75">
              <input type="text" id="tele" name="tele" value="<?php echo $teleBeneficier; ?>" required>
              </div>
          </div>
          <br>
          <div class="row">
              <input type="submit" name="modifierB" value="Ajouter">
          </div>
      </form>
  </div>
</div>
