<?php 
    require 'functions.php';
    navbar();
?>

<style>
* {
  box-sizing: border-box;
}

input[type=text], input[type=date], input[type=time], select, textarea {
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
  if(isset($_POST['ajoutR'])){
    $dateReservation = $_POST['dateReservation'];
    $heurDebutMatch = $_POST['heurDebutMatch'];
    $estPayer = (isset($_POST['estPayer']))?1:0;
    $datePaiement = $_POST['datePaiement'];
    $terrain = $_POST['terrain'];
    $beneficier = $_POST['beneficier'];

    $connexion = getConnection();
    $query = ''; 
    if($estPayer == 1){
      $query = "INSERT INTO reservation(date_Reservation, heur_Match, est_paye, date_Payement, id_Terrain, id_Beneficiere) 
              VALUES ('$dateReservation', '$heurDebutMatch', '$estPayer', '$datePaiement', '$terrain', '$beneficier')";
    }else{
      $query = "INSERT INTO reservation(date_Reservation, heur_Match, est_paye, date_Payement, id_Terrain, id_Beneficiere) 
              VALUES ('$dateReservation', '$heurDebutMatch', '$estPayer', 'Null', '$terrain', '$beneficier')";
    }
    
    echo $query;
    
    $exec = mysqli_query($connexion, $query);
    if ($exec)
      echo '<script type="text/javascript">
              alert("Reservation ajouter avec succes!!!");
          </script>';
    else
      echo '<script type="text/javascript">
              alert("Probleme dans l\'ajout");
          </script>';
    header('Location: reservation.php');
  }
?>

<div class='body'>
  <h3>Ajouter Reservation</h3>
  <div class="container">
      <form action="ajouterReservation.php" method="POST">
          <div class="row">
              <div class="col-25">
              <label for="dateR">Date de Reservation</label>
              </div>
              <div class="col-75">
              <input type="date" id="dateR" name="dateReservation" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="heurR">Heur de Debut</label>
              </div>
              <div class="col-75">
              <input type="time" id="heurR" name="heurDebutMatch" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="estPayer">Reservation payee</label>
              </div>
              <div class="col-75">
              <input type="checkbox" id="estPayer" name="estPayer" >
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="dateP">Date de paiement</label>
              </div>
              <div class="col-75">
              <input type="date" id="dateP" name="datePaiement" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="terrain">Terrain</label>
              </div>
              <div class="col-75">
              <select id="terrain" name="terrain" required>
                  <?php
                      $connexion = getConnection();
                      $query = "SELECT id_Terrain, Libelle_Terrain FROM terrain";
                      $result = mysqli_query($connexion, $query);
                      if($result){
                          echo '<option value="">Selectionner un terrain</option>';
                      }
                      while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                          echo '
                          <option value="'.$row[0].'">'.$row[1].'</option>
                          ';
                      }
                  ?>
              </select>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="beneficier">Beneficier</label>
              </div>
              <div class="col-75">
              <select id="beneficier" name="beneficier" required>
                  <?php
                      $connexion = getConnection();
                      $query = "SELECT id_Beneficier, nom, prenom FROM beneficier";
                      $result = mysqli_query($connexion, $query);
                      if($result){
                          echo '<option value="">Selectionner un benificier</option>';
                      }
                      while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                          echo '
                          <option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>
                          ';
                      }
                  ?>
              </select>
              </div>
          </div>
          <br>
          <div class="row">
              <input type="submit" name='ajoutR' value="Ajouter">
          </div>
      </form>
  </div>
</div>
