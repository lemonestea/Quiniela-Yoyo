<?php

    function display_table(object $pdo, int $numero_de_posiciones){
        $query = "SELECT * FROM tabla_de_posiciones ORDER BY puntos DESC;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $table = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        $points_mask = 0;
        if(isset($table[0]['username'])){

            foreach($table as $row){
                
                if($points_mask != $row['puntos']){
                    $i += 1;   
                }

                if($row["username"] === $_SESSION["user_username"]){
                    $class = "myposition";
                }
                else{
                    $class = "position";
                }
                if($i == 1)
                {
                    echo "<div style='color: gold;' class = '".$class."-number'>&#129351;</div>";
                    echo "<div style='color: gold;' class = '".$class."-user'>" . $row['username'] . "</div>";
                    echo "<div style='color: gold;' class = '".$class."-puntos'>" . $row["puntos"] . "</div>\n";
                    
                }
                elseif($i == 2)
                {
                    echo "<div style='color:silver;' class = '".$class."-number'>&#129352;</div>";
                    echo "<div style='color:silver;' class = '".$class."-user'>" . $row['username'] . "</div>";
                    echo "<div style='color:silver;' class = '".$class."-puntos'>" . $row["puntos"] . "</div>\n";
                    
                }
                elseif($i == 3)
                {
                    echo "<div style='color:rgb(142, 61, 0);' class = '".$class."-number'>&#129353;</div>";
                    echo "<div style='color:rgb(142, 61, 0);' class = '".$class."-user'>" . $row['username'] . "</div>";
                    echo "<div style='color:rgb(142, 61, 0);' class = '".$class."-puntos'>" . $row["puntos"] . "</div>\n";
                    
                }
                else
                {
                    echo "<div class = '".$class."-number'>" . $i . "</div>";
                    echo "<div class = '".$class."-user'>" . $row['username'] . "</div>";
                    echo "<div class = '".$class."-puntos'>" . $row["puntos"] . "</div>\n";
                    
                }
                
                $points_mask = $row['puntos'];
                if($numero_de_posiciones == $i){
                    break;
                }            
                
            }
        }

    }