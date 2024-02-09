<?php require_once('config_session_inside.inc.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<ul class='topnav'>
  <li><img alt = 'Quiniela Yoyo' style="margin:5px;" id="logo" height="40" width="40" src="/images/icon_soccerball.png"></li>
  <li><a  href="../index.php">Inicio</a></li>
  <li><a href="mispuntos.php">Mis Puntos</a></li>
  <li><a href="jugar.php">Jugar</a></li>
  <li><a href="tabla.php">Tabla</a></li>
  <li><a href="reglas.php">Reglas</a></li>
  <li><a href="instrucciones.php">Instrucciones</a></li>
  <li><a href="equipos.php">Equipos</a></li>
  <li><a href="buscar.php">Buscar</a></li>
  <li><a href="perfil.php">Mi Perfil</a></li>
  
  <li class="right">
    <a href="logout.inc.php">Salir</a>
  </li>


</ul>

<div class="mobile-container">

<!-- Top Navigation Menu -->
<div class="mobile">
  
  <a href="../index.php" class="active"><img alt = 'Quiniela Yoyo' id="logo-mobile" height="25"
  width="25" style="margin-right:1ch;" src="/images/icon_soccerball.png">Inicio</a>
  <div id="myLinks">
    <a href="mispuntos.php">Mis Puntos</a>
    <a href="jugar.php">Jugar</a>
    <a href="tabla.php">Tabla</a>
    <a href="reglas.php">Reglas</a>
    <a href="instrucciones.php">Instrucciones</a>
    <a href="equipos.php">Equipos</a>
    <a href="buscar.php">Buscar</a>
    <a href="perfil.php">Mi Perfil</a>
    <a class="salir" href="logout.inc.php">Salir</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars" style="margin-top:4px;"></i>
  </a>
</div>
</div>
<br><br>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
