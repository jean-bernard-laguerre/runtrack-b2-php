<?php
    function my_is_prime(int $number) : bool {

        for ($i = $number-1; $i > 1; $i--) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }
?>