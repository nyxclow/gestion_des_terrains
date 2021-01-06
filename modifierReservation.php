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
<div class='body'>
  <?php
    if(isset($_GET['idR'])){
      $connexion = getConnection();
      $query = "SELECT id_Reservation, date_Reservation, heur_Match, est_paye, date_Payement, id_Terrain, id_Beneficiere FROM reservation WHERE id_Reservation =".$_GET['idR'];
      $result = mysqli_query($connexion, $query);
      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $idReservation = $row[0];
      $dateReservation = $row[1];
      $heurMatch = explode(' ', $row[2])[1];
      $estPayee = $row[3];
      $datePaiement = $row[4];
      $idTerrain = $row[5];
      $idBeneficier = $row[6];
    }
    if(isset($_POST['modifR'])){
      $idReservation = $_POST['idReservation'];
      $dateReservation = $_POST['dateReservation'];
      $heurDebutMatch = $_POST['heurDebutMatch'];
      $estPayer = (isset($_POST['estPayer']))?1:0;
      $datePaiement = $_POST['datePaiement'];
      $terrain = $_POST['terrain'];
      $beneficier = $_POST['beneficier'];
  
      $connexion = getConnection();
      $query = ''; 
      if($estPayer == 1){
        $query = "UPDATE reservation 
                  SET date_Reservation='$dateReservation',heur_Match='$heurDebutMatch',est_paye='$estPayer',date_Payement='$datePaiement',id_Terrain='$terrain',id_Beneficiere='$beneficier'
                  WHERE id_Reservation=";
      }else{
        $query = "UPDATE reservation 
                  SET date_Reservation='$dateReservation',heur_Match='$heurDebutMatch',est_paye='$estPayer',date_Payement='Null',id_Terrain='$terrain',id_Beneficiere='$beneficier'
                  WHERE id_Reservation=";
      }
      
      echo $query;
      
      $exec = mysqli_query($connexion, $query);
      if ($exec)
        echo '<script type="text/javascript">
                alert("Reservation modifier avec succes!!!");
            </script>';
      else
        echo '<script type="text/javascript">
                alert("Probleme dans la modification");
            </script>';
      header('Location: reservation.php');
    }
  ?>
  <h3>Modifier Reservation</h3>
  <div class="container">
      <form action="modifierReservation.php" method="POST">
      <div class="row">
              <div class="col-25">
              <label for="idR">ID de Reservation</label>
              </div>
              <div class="col-75">
              <input type="text" id="idR" value="<?php echo $idReservation; ?>" disabled>
              <input type="text" id="idR" name="idReservation" value="<?php echo $idReservation; ?>" hidden>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="dateR">Date de Reservation</label>
              </div>
              <div class="col-75">
              <input type="date" id="dateR" name="dateReservation" value="<?php echo $dateReservation; ?>" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="heurR">Heur de Debut</label>
              </div>
              <div class="col-75">
              <input type="time" id="heurR" name="heurDebutMatch" value="<?php echo $heurMatch; ?>" required>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="estPayer">Reservation payee</label>
              </div>
              <div class="col-75">
              <input type="checkbox" id="estPayer" name="estPayer" <?php echo ($estPayee == 1)?'checked':''; ?>>
              </div>
          </div>
          <div class="row">
              <div class="col-25">
              <label for="dateP">Date de paiement</label>
              </div>
              <div class="col-75">
              <input type="date" id="dateP" name="datePaiement" value="<?php echo $datePaiement; ?>" >
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
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                  if($row[0] == $idTerrain)
                    echo'
                    <option value="'.$row[0].'" selected>'.$row[1].'</option>
                    ';
                  else
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
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                    if($row[0] == $idBeneficier)
                      echo'
                      <option value="'.$row[0].'" selected>'.$row[1].' '.$row[2].'</option>
                      ';
                    else
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
              <input type="submit" name="modifR" value="Submit">
          </div>
      </form>
  </div>
</div>
