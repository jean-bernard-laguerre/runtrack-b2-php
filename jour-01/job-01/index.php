<?php
    function my_str_search(string $haystack, string $needle) : int {
        
        $count = 0;
        
        for ($i = 0; ;$i++) {
            if (!isset($haystack[$i])){
                break;
            }
            if ($needle == $haystack[$i]) {
                $count++;
            }
        }

        return $count;
    }
?>