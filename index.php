<?php 
    require 'functions.php';
    navbar();
?>
<html>

<head>
  <title>Gestion de Reservation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <style>
    

* {
  margin: 0;
  padding: 0px;
  font-family: 'Lato', sans-serif;
}

body {
  
  background-color: rgb(148, 193, 211);
  margin: 0;
  color: #5a5a5a;
}

h1{
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  color: black;
}

html, body {
  height: 100%;
}



#h {
  background: url(arsenal.jpg) no-repeat center top ;
  padding-top: 100px;
  text-align: center;
  background-attachment: relative;
  background-position: center center;
  min-height: 500px;
  width: 100%;
  color: white;
  -webkit-background-size: 100%;
  -moz-background-size: 100%;
  -o-background-size: 100%;
  background-size: 100%;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#h h1 {
  font-weight: 900;
  font-size: 60px;
  letter-spacing: 1px;
}
.fa {
  padding: 20px;
  font-size: 30px;
  width: 75px;
  text-align: center;
  text-decoration: none;
  margin: 10px 5px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}



.fa-instagram {
  background: #125688;
  color: white;
}

.fa-github {
  background: black;
  color: white;
}

footer {
  background: rgba(0, 0, 0, 0.815);
  overflow-x: hidden;
  padding: 14vmin 18vmin;
}

footer p > span {
  color: #2fa1ff;
}

footer input {
  border: none !important;
}

footer input::placeholder {
  color: white !important;
}

footer .input-group .input-group-text {
  background: var(--bggradient);
  border: none;
}





footer .column i + i {
  padding: 0 0.5em;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.815);
  z-index: 9999;
  transition: all 1.5s ease;
}

  </style>
</head>
  
  <div id="h">
    <div class="container">


          <h1>Gestion de Reservation de Terrain</h1>

          <div class="countdown-header">
        </div>
      </div>

    </div>
    <br>
    <br>
    <br>
  <div class="container">
    <h2>Manuel d'utilisation</h2>
    <ul class="list-group">
      <li class="list-group-item list-group-item-success">Beneficiers: pour ajouter des benefecier avec leur nom prenom cin et telephone
  </li>
     <li class="list-group-item list-group-item-info">Terrain: pour ajouter des nouveaux terrains</li>
     <li class="list-group-item list-group-item-primary">Reservation : pour ajouter une  reservation </li>
    </ul>
  </div> <br>



          <br>
          <br>
          <footer>
            <div class="container-fluid p-0">
              <div class="row text-left">
                <div class="col-md-5 col-sm-5">
                  <h4 class="text">A propos de nous </h4>
                  
                  <p class="pt-4 text-muted">Copyright ©2021 All rights reserved | ce site est crée par:
                    <span> Dbilij Anas & El Guendouz Oumaima</span>
                  </p>
                </div>
                <div class="col-md-5 col-sm-12">
                  <h4 class="text">Boite de Communivation</h4>
                  <p class="text-muted">contacter nous</p>
                  <form class="form-inline">
                    <div class="col pl-0">
                      <div class="input-group pr-5">
                        <input type="text" class="form-control bg-dark text-white" id="inlineFormInputGroupUsername2" placeholder="Email">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-arrow-right"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-2 col-sm-12">
                  <h4 class="text">Reseau sociaux</h4>
                  
                  <div class="column text-light">
                    <a href="https://facebook.com/nyxclow" class="fa fa-facebook"></a>
            <a href="https://twitter.com/nyxclow" class="fa fa-twitter"></a>
            <a href="https://instagram.com/notanasdbilij" class="fa fa-instagram"></a>
            

                  </div>
                </div>
              </div>
            </div>
          </footer>
</body>
</html>
