<?php
    function my_str_reverse(string $string) : string {

        $length = 0;

        for ($i = 0; ; $i++) {
            if (!isset($string[$i])){
                break;
            }
            $length++;
        }

        for ($j = $length-1; $j >= 0 ; $j--) {
            echo $string[$j];
        }
    }
?>