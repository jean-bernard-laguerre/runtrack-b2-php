<?php
    function my_closest_to_zero(array $array) : int {

        $closest = $array[0];

        for($i = 0; ; $i++) {
            if(!isset($array[$i])) {
                break;
            }
            
            if ($array[$i] < 0) {
                $condition = ($closest*$closest > $array[$i]*$array[$i]);
            }else {
                $condition = ($closest > $array[$i]);
            }

            if ($condition) {
                $closest = $array[$i];
            }
        }

        return $closest;
    }
?>