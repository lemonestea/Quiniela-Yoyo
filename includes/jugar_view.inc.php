<?php
function display_table(array | null $result, string $fase){

    $i = 0;
    $l = 0;
    $toggler = true;
    if(isset($result)){
        echo '<form action = "load_results.php" method = "post">
            <div class="tabla">';
        foreach($result as $match){

            $bandera1 = assign_file_path($match['equipo1']);
            $bandera2 = assign_file_path($match['equipo2']);
            
            echo"<div class = 'equipo1'>";
            echo'<div><img class="bandera1" ';
            echo 'src = "'.$bandera1.'" ';  
            echo 'width = "25" height = "25"></div>';
            echo $match["equipo1"];
            echo"</div>";
            echo"<div class = 'resultado1'>";
            echo"<input type='number' required='required' min = '0' max = '99' name = 'resultado".$i."'>";
            echo"</div>";
            $i = $i + 1;
            echo"<div class = 'resultado2'>";
            echo"<input type='number' required='required' min = '0' max = '99' name = 'resultado".$i."'>";
            $i = $i + 1;
            echo"</div>";
            echo"<div class = 'equipo2'>";
            echo'<div><img class="bandera2" ';
            echo 'src="'.$bandera2.'" ';  
            echo 'width="25" height="25"></div>';
            echo $match["equipo2"]."</div>";
            if($fase != "fasedegrupos"){
                echo "<div class = 'penales'></div><div class = 'resultado1'>";
                echo "<input type = 'number' min = '0' max = '50' name = 'penales".$l."'>";
                echo "</div>";
                $l += 1;
                echo "<div class = 'resultado2'>";
                echo "<input type = 'number' min = '0' max = '50' name = 'penales".$l."'>";
                echo "</div>";
                $l += 1;
                echo "<div class = 'penales'></div>";
            }
        }
            echo "<div class='boton_enviar'>";
            echo"<button>Enviar</button>";
            echo"<br><br>";
            echo"</div>";
            echo"</div>";
            echo"<input type = 'hidden' name = 'fase' value = '".$fase."'>";
            echo"</form>";
        $i = 0;

    }
    
    else{
        echo "<div class = 'sin_acceso'>Ya no tienes acceso a la tabla!</div>";
    }
    echo "<br><br>";
}

function assign_file_path(string $equipo){
    $path = null;
    if($equipo === 'Argentina'){
        $path = '../images/paises/argentina.png';
    }

    elseif($equipo === 'Bolivia'){
        $path = '../images/paises/bolivia.png';
    }

    elseif($equipo === 'Brasil'){
        $path = '../images/paises/brasil.png';
    }

    elseif($equipo === 'Chile'){
        $path = '../images/paises/chile.png';
    }

    elseif($equipo === 'Colombia'){
        $path = '../images/paises/colombia.png';
    }

    elseif($equipo === 'Ecuador'){
        $path = '../images/paises/ecuador.png';
    }

    elseif($equipo === 'Estados Unidos'){
        $path = '../images/paises/estados_unidos.png';
    }

    elseif($equipo === 'Jamaica'){
        $path = '../images/paises/jamaica.png';
    }

    elseif($equipo === 'Mexico'){
        $path = '../images/paises/mexico.png';
    }

    elseif($equipo === 'Panama'){
        $path = '../images/paises/panama.png';
    }

    elseif($equipo === 'Paraguay'){
        $path = '../images/paises/paraguay.png';
    }

    elseif($equipo === 'Peru'){
        $path = '../images/paises/peru.png';
    }

    elseif($equipo === 'Uruguay'){
        $path = '../images/paises/uruguay.png';
    }

    elseif($equipo === 'Venezuela'){
        $path = '../images/paises/venezuela.png';
    }

    else{
        $path = '../images/paises/por_definir.png';
    }

    

    return $path;
}
?>