<html>
    <head>
    <link rel="icon" type="image/png" href="/images/icon_soccerball.png">
    <link rel="stylesheet" href="/styles/instrucciones.css">
    <link rel="stylesheet" href="/styles/general_styles.css">
    <link rel="stylesheet" href="/styles/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=0">
    <title>Instrucciones</title>
    </head>
    <body>
        <?php  
            require_once("menu.php");
            require_once("redirect.php");
        ?>
        <div class='instrucciones'>
        <details class = "details">
        <summary class = "summary">Cómo Jugar</summary>
        <div>
            <ul>
            <p><span class="paso">&#11088 Paso 1:</span>
            <br><br>
            <img height = 70px width = 111px src="../images/screenshots/jugar_ingresaresultados1.JPG">
            <br><br>
            Cada jugador debe acceder a la sección "Jugar" en el menú. 
            En esta página, encontrarán una tabla que muestra el estado de las fases.
            <br><br>
            </p>
            
            <p><span class="paso">&#11088 Paso 2:</span>
            <br><br>
            <img height = 202px width = 460px src="../images/screenshots/jugar_ingresaresultados.JPG">
            <br><br>
            A medida que avancen las fases, obtendrán acceso para enviar resultados.
            En la tabla, las celdas muestran si pueden enviar su quiniela (Enviado,
             Abierto y Cerrado). Haz clic en la fase abierta.
            </p>

            <p><span class="paso">&#11088 Paso 3.1:</span>
            <br><br>
            <img height = '240px' width = '350px' src="../images/screenshots/jugar_1.JPG">
            <br><br>
            En la fase, verán una tabla con los equipos y dos cajas de texto para 
            indicar el resultado de su quiniela. Llenen todas las cajas antes de enviar.

            </p>

            <p>
            <span class="paso">&#11088 Paso 3.2:</span>
            <br><br>
            <img height = '240px' width = '300px' src="../images/screenshots/jugar_3.JPG">
            <br><br>
            A partir de Cuartos de Final, podrán prever empates y resultados de penales.
            Llenen las casillas correspondientes según sus predicciones.
            <br><br>
            Nota: El resultado de las primeras dos casillas en cada partido es el resultado del partido.
            En las casillas de abajo va el resultado de los penales.

            </p>

            <p>
            <span class="paso">&#11088 Paso 4:</span>
            <br><br>
            <img height = '84px' width = '160px' src="../images/screenshots/jugar_2.JPG">
            <br><br>
            Al final de la tabla, encontrarán un botón para enviar la quiniela.
             Hagan clic en él para completar el proceso.
            
            

            </p>

            </ul>
        </div>

        </details>

        <details class = "details">
        <summary class = "summary">Cómo ver Mis Puntos</summary>
        <div>
            <ul>
                <p>
                <img height = '70px' width = '207px' src="../images/screenshots/mispuntos_1.JPG">
                <br><br>
                Después de enviar la quiniela, los usuarios pueden ver la 
                cantidad de puntos que han acumulado. Esto se hace ingresando
                a la sección "Mis Puntos".
                
                </p>

                <p>
                <img height = '240px' width = '198px' src="../images/screenshots/mispuntos_2.JPG">
                <br><br>
                En "Mis Puntos", los usuarios verán una tabla que muestra
                cuántos puntos han ganado en cada fase de la Copa América y cuántos han acumulado
                en total. El botón de [Cargar] manda tus puntos totales a la tabla de posiciones.
                
                </p>

                <p>
                <img height = '203px' width = '520px' src="../images/screenshots/mispuntos_3.JPG">
                <br><br>
                Al hacer clic en sus puntos de una fase específica, los usuarios
                serán llevados a otra página. En esta nueva página, se mostrarán
                los resultados de su quiniela y los resultados reales de la Copa
                América. También se especificará cuántos puntos ganaron en cada
                partido de esa fase.
                </p>
            </ul>
        </div>
        </details>

        <details class = "details">
        <summary class = "summary">La Tabla de posiciones</summary>
        <div>
            <ul>
                <p>
                <img height = '70px' width = '120px' src="../images/screenshots/tabla_1.JPG">
                <br><br>
                Para ver la tabla de posiciones, los jugadores deben ir a la sección
                "Tabla" en el menú de la página.
                </p>
                
                <p>
                <img height = '240px' width = '200px' src="../images/screenshots/tabla_2.JPG">
                <br><br>
                Una vez en la sección "Tabla", los jugadores verán una lista de participantes
                junto con su posición en la tabla y la cantidad total de puntos que han
                acumulado hasta el momento.
                </p>

                <p>
                <img height = '80px' width = '200px' src="../images/screenshots/tabla_3.JPG">
                <br><br>
                El botón de [Cargar Tabla] recalcula los puntos de todos los jugadores y recarga
                la tabla
                </p>
            </ul>
        </div>
        </details>
            
            
        </div>

    </body>
</html>
