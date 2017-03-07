<?php 
    
    /*$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');*/
    /*echo $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];*/
    $colors = array('#ff0000','#0026ff','#00179b','#00efeb','#00ef2b','#efd700','#efd700','#ef7700');
    $color_change = "0"; //Assigning a variable with no value 
      $change = rand(1, 8); //Getting random number 
      switch($change){
        case 1: $color_change = $colors[0];
        break;
        case 2: $color_change = $colors[1];
        break;
        case 3: $color_change = $colors[2];
        break;
        case 4: $color_change = $colors[3];
        break;
        case 5: $color_change = $colors[4];
        break;
        case 6: $color_change = $colors[5];
        break;
        case 7: $color_change = $colors[6];
        break;
        case 8: $color_change = $colors[7];
        break;
    }
    echo $color_change;
?>