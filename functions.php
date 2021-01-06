<?php
function navbar(){
    echo'
    <style>

    body {
    margin: 0;

    font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
    overflow: hidden;
    background-color: #333;
    }

    .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    }

    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }


    
    </style>
    </head>
    <body>
    <script language=javascript>
        function nyx(){ alert("pas de notification"   ); }
    </script>

    <div class="topnav">
    <a  href="index.php">Accueil</a>
    <a href="beneficier.php">Bénéficiers</a>
    <a href="terrain.php">Terrains</a>
    <a href="reservation.php">Réservation</a>';
    $notification = getNotification();
    if ($notification == 0)
        echo '<a style="float:right; href="notification.php" onclick="nyx()">Notification ('.$notification.')</a>';
    else
        echo '<a style="float:right; background-color:#DC143C" href="notification.php">Notification ('.$notification.')</a>';
    echo '</div>';
}

function getNotification(){
    $connexion = getConnection();
    $query = "SELECT COUNT(id_Reservation) FROM reservation WHERE DATEDIFF(SYSDATE(), date_Reservation) <= 1";
    $result = mysqli_query($connexion, $query);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    return $row[0];
}
include("connexion.php");
?>
