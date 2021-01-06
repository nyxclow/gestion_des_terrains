<style>
    .body{
        padding: 50px;
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    th, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    th, td{
    padding: 12px;
    text-align: left;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>

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
    <h3 style='text-align:center'>Cette page afficher les reservation les plus recentes (24h)</h3>
    <br><br>
    <table border=1>
        <tr>
            <th>ID Reservation</th>
            <th>Date Reservation</th>
            <th>Heur debut de natch</th>
            <th>Est payes</th>
            <th>Date de payement</th>
            <th>Terrain</th>
            <th>Beneficier</th> 
        </tr>
        <?php 
            $connexion = getConnection();
            $query = "  SELECT id_Reservation, date_Reservation, heur_Match, est_paye, date_Payement, t.id_Terrain, t.Libelle_Terrain, b.id_Beneficier, b.nom, b.prenom 
                        FROM reservation as r 
                        INNER JOIN terrain as t 
                        ON r.id_Terrain = t.id_Terrain 
                        INNER JOIN beneficier as b 
                        ON b.id_Beneficier = r.id_Beneficiere
                        WHERE DATEDIFF(SYSDATE(), date_Reservation) <= 1";
            $result = mysqli_query($connexion, $query);
            while ($row = mysqli_fetch_array($result)){
                echo '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.explode(':', explode(' ', $row[2])[1])[0].'h</td>
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[6].'</td>
                    <td>'.$row[8].' '.$row[9].'</td>
                </tr>
                ';
            }
        ?>
    </table>
</div>