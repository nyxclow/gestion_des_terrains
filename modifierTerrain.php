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
    if(isset($_GET['idT'])){
      $connexion = getConnection();
      $query = "SELECT id_Terrain, Libelle_Terrain FROM terrain WHERE id_Terrain =".$_GET['idT'];
      $result = mysqli_query($connexion, $query);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $idTerrain = $row[0];
      $libelleTerrain = $row[1];
    }
    if(isset($_POST['modifT'])){
      $idTerrain = $_POST['idTerrain'];
      $terrain = $_POST['terrain'];
  
      $connexion = getConnection();
      $query = "UPDATE terrain SET Libelle_Terrain='$terrain' WHERE id_Terrain=".$idTerrain;
      $exec = mysqli_query($connexion, $query);
      if ($exec)
        echo '<script type="text/javascript">
                alert("Terrain ajouter avec succes!!!");
            </script>';
      else
        echo '<script type="text/javascript">
                alert("Probleme dans l\'ajout");
            </script>';
      header('Location: terrain.php'); 
    }
  ?>
  <h3>Modifier Terrain</h3>
  <div class="container">
      <form action="modifierTerrain.php" method="POST">
      <div class="row">
              <div class="col-25">
              <label for="terrain">Libelle de Terrain</label>
              </div>
              <div class="col-75">
              <input type="text" id="idTerrain" value="<?php echo $idTerrain; ?>" disabled>
              <input type="text" id="idTerrain" name="idTerrain" value="<?php echo $idTerrain; ?>" hidden>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="terrain">Libelle de Terrain</label>
              </div>
              <div class="col-75">
              <input type="text" id="terrain" name="terrain" value="<?php echo $libelleTerrain; ?>" required>
              </div>
          </div>
          
          <br>
          <div class="row">
              <input type="submit" name="modifT" value="Ajouter">
          </div>
      </form>
  </div>
</div>
