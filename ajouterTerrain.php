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

<?php
  if(isset($_POST['ajoutT'])){
    $terrain = $_POST['terrain'];

    $connexion = getConnection();
    $query = "INSERT INTO terrain(Libelle_Terrain) VALUES ('$terrain')";
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

<div class='body'>
  <h3>Ajouter Terrain</h3>
  <div class="container">
      <form action="ajouterTerrain.php" method="POST">
          <div class="row">
              <div class="col-25">
              <label for="terrain">Libelle de Terrain</label>
              </div>
              <div class="col-75">
              <input type="text" id="terrain" name="terrain" required>
              </div>
          </div>
          
          <br>
          <div class="row">
              <input type="submit" name='ajoutT' value="Ajouter">
          </div>
      </form>
  </div>
</div>
