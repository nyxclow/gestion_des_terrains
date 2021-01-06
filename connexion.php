<?php
function getConnection(){
    $connexion = mysqli_connect("127.0.0.1", "root", "Anass123@#", "nyxclow");

    if (!$connexion) {
        echo "Erreur lors de la connexion." . PHP_EOL;
        echo "Erreur: " . mysqli_connect_errno() . PHP_EOL;
        exit;
    }else {
        return $connexion;
    }
}
?>
