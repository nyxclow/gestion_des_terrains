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
 	 background-color: #B22222	;
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

    if(isset($_GET['idT'])){
        $connexion = getConnection();
        $subQuery = "SELECT COUNT(*) FROM reservation WHERE id_Terrain=".$_GET['idT'];
        $subExec = mysqli_query($connexion, $subQuery);
        $subRow = mysqli_fetch_array($subExec, MYSQLI_NUM);
        if($subRow[0] != 0){
            echo '<script type="text/javascript">
                alert("Erreur de suppression\nTerrain associer a des reseravtion");
            </script>';
        }else {
            $query = "DELETE FROM terrain WHERE id_Terrain=".$_GET['idT'];
            $exec = mysqli_query($connexion, $query);
            if ($exec)
            echo '<script type="text/javascript">
                    alert("Terrain supprimer avec succes!!!");
                </script>';
            else
            echo '<script type="text/javascript">
                    alert("Probleme dans l\'ajout");
                </script>';
            header('Location: terrain.php');
        }
    }   
?>
<div class='body'>
    <a class="class" style='padding: 12px;' href="ajouterTerrain.php">Ajouter Terrain</a>
    <br><br>
    <table border=1 class="table table-dark table-hover">
        <tr>
            <th>ID Terrain</th>
            <th>Libelle Terrain</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
            $connexion = getConnection();
            $query = "SELECT id_Terrain, Libelle_Terrain FROM terrain";
            $result = mysqli_query($connexion, $query);
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td><a class="class"   style="background-color: #4CAF50;" href="modifierTerrain.php?idT='.$row[0].'">Modifier</a></td>
                    <td><a class="class" href="terrain.php?idT='.$row[0].'">Supprimer</a></td>
                </tr>
                ';
            }
        ?>
    </table>
</div>
</body>
</html>