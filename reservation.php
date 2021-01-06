<html>
<head></head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .body{
        padding: 50px;
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

 .class{
  background-color:  #B22222;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
	
	
	
	}
</style>
<body>
<?php 
    require 'functions.php';
    navbar();
    if(isset($_GET['idR'])){
        $connexion = getConnection();
        $query = "DELETE FROM reservation WHERE id_Reservation=".$_GET['idR'];
        $exec = mysqli_query($connexion, $query);
        if ($exec)
        echo '<script type="text/javascript">
                alert("Beneficier supprimer avec succes!!!");
            </script>';
        else
        echo '<script type="text/javascript">
                alert("Probleme dans l\'ajout");
            </script>';
        header('Location: reservation.php');
    }
?>
<div class='body'>
    <a class="class" style='padding: 12px;' href="ajouterReservation.php">Ajouter Reservation</a>
    <br><br>
    <table border=1 class="table table-dark table-hover">
        <tr>
            <th>ID Reservation</th>
            <th>Date Reservation</th>
            <th>Heur debut de natch</th>
            <th>Est payes</th>
            <th>Date de payement</th>
            <th>Terrain</th>
            <th>Beneficier</th> 
            <th></th>
            <th></th>
        </tr>
        <?php 
            $connexion = getConnection();
            $query = "  SELECT id_Reservation, date_Reservation, heur_Match, est_paye, date_Payement, t.id_Terrain, t.Libelle_Terrain, b.id_Beneficier, b.nom, b.prenom 
                        FROM reservation as r 
                        INNER JOIN terrain as t 
                        ON r.id_Terrain = t.id_Terrain 
                        INNER JOIN beneficier as b 
                        ON b.id_Beneficier = r.id_Beneficiere";
            $result = mysqli_query($connexion, $query);
            while ($row = mysqli_fetch_array($result)){
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.explode(':', explode(' ', $row[2])[1])[0].'h</td>
                    <td><b>';
                    echo ($row[3]==1)?'Oui':'Non';
                    echo '</b></td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[6].'</td>
                    <td>'.$row[8].' '.$row[9].'</td>
                    <td><a class="class" style="background-color: #4CAF50;" href="modifierReservation.php?idR='.$row[0].'">Modifier</a></td>
                    <td><a class="class" href="reservation.php?idR='.$row[0].'">Supprimer</a></td>
                </tr>
                ';
            }
        ?>
    </table>
</div>
</body>
</html>