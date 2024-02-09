<!DOCTYPE html>
<html lang='es'>
    <head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/instrucciones.css">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instrucciones</title>
    </head>
    <body>
        <?php  
            require_once("menu.php");
            require_once("config_session_inside.inc.php");
            require_once('redirect.php');
        ?>
        <div class='instrucciones'>
        <details class = "details">
        <summary class = "summary">Cómo Jugar</summary>
        <div>
            <ul>
            <li>
                <span class="paso">&#11088; Paso 1:</span>
                <br><br>
                <img alt ='screenshot' height = '70' width = '111' src="../images/screenshots/jugar_ingresaresultados1.JPG">
                <br><br>
                Cada jugador debe acceder a la sección "Jugar" en el menú. 
                En esta página, encontrarán una tabla que muestra el estado de las fases.
                <br><br>
            </li>
            
            <li>
                <span class="paso">&#11088; Paso 2:</span>
                <br><br>
                <img alt ='screenshot' height = '202' width = '460' src="../images/screenshots/jugar_ingresaresultados.JPG">
                <br><br>
                A medida que avancen las fases, obtendrán acceso para enviar resultados.
                En la tabla, las celdas muestran si pueden enviar su quiniela (Enviado,
                Abierto y Cerrado). Haz clic en la fase abierta.
            </li>

            <li>
                <span class="paso">&#11088; Paso 3.1:</span>
                <br><br>
                <img alt ='screenshot' height = '240' width = '350' src="../images/screenshots/jugar_1.JPG">
                <br><br>
                En la fase, verán una tabla con los equipos y dos cajas de texto para 
                indicar el resultado de su quiniela. Llenen todas las cajas antes de enviar.
            </li>

            <li>
                <span class="paso">&#11088; Paso 3.2:</span>
                <br><br>
                <img alt ='screenshot' height = '240' width = '300' src="../images/screenshots/jugar_3.JPG">
                <br><br>
                A partir de Cuartos de Final, podrán prever empates y resultados de penales.
                Llenen las casillas correspondientes según sus predicciones.
                <br><br>
                Nota: El resultado de las primeras dos casillas en cada partido es el resultado del partido.
                En las casillas de abajo va el resultado de los penales.
            </li>

            <li>
                <span class="paso">&#11088; Paso 4:</span>
                <br><br>
                <img alt ='screenshot' height = '84' width = '160' src="../images/screenshots/jugar_2.JPG">
                <br><br>
                Al final de la tabla, encontrarán un botón para enviar la quiniela.
                Hagan clic en él para completar el proceso.
            </li>

            </ul>
        </div>

        </details>

        <details class = "details">
        <summary class = "summary">Cómo ver Mis Puntos</summary>
        <div>
            <ul>
                <li>
                    <img alt ='screenshot' height = '70' width = '207' src="../images/screenshots/mispuntos_1.JPG">
                    <br><br>
                    Después de enviar la quiniela, los usuarios pueden ver la 
                    cantidad de puntos que han acumulado. Esto se hace ingresando
                    a la sección "Mis Puntos".
                </li>

                <li>
                    <img alt ='screenshot' height = '240' width = '198' src="../images/screenshots/mispuntos_2.JPG">
                    <br><br>
                    En "Mis Puntos", los usuarios verán una tabla que muestra
                    cuántos puntos han ganado en cada fase de la Copa América y cuántos han acumulado
                    en total. El botón de [Cargar] manda tus puntos totales a la tabla de posiciones.
                </li>

                <li>
                    <img alt ='screenshot' height = '203' width = '520' src="../images/screenshots/mispuntos_3.JPG">
                    <br><br>
                    Al hacer clic en sus puntos de una fase específica, los usuarios
                    serán llevados a otra página. En esta nueva página, se mostrarán
                    los resultados de su quiniela y los resultados reales de la Copa
                    América. También se especificará cuántos puntos ganaron en cada
                    partido de esa fase.
                </li>
            </ul>
        </div>
        </details>

        <details class = "details">
        <summary class = "summary">La Tabla de posiciones</summary>
        <div>
            <ul>
                <li>
                    <img alt ='screenshot' height = '70' width = '120' src="../images/screenshots/tabla_1.JPG">
                    <br><br>
                    Para ver la tabla de posiciones, los jugadores deben ir a la sección
                    "Tabla" en el menú de la página.
                </li>
                
                <li>
                    <img alt ='screenshot' height = '240' width = '200' src="../images/screenshots/tabla_2.JPG">
                    <br><br>
                    Una vez en la sección "Tabla", los jugadores verán una lista de participantes
                    junto con su posición en la tabla y la cantidad total de puntos que han
                    acumulado hasta el momento.
                </li>

                <li>
                    <img alt ='screenshot' height = '80' width = '200' src="../images/screenshots/tabla_3.JPG">
                    <br><br>
                    El botón de [Cargar Tabla] recalcula los puntos de todos los jugadores y recarga
                    la tabla
                </li>
            </ul>
        </div>
        </details>
            
            
        </div>

    </body>
</html>
