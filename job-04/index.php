<?php
    function my_fizz_buzz(int $length) : array {

        for ($i = 1; $i <= $length; $i++) {
            if(($i % 3 == 0) && ($i % 5 == 0)){
                echo 'FizzBuzz';
            }
            elseif ($i % 5 == 0) {
                echo 'Buzz';
            }
            elseif ($i % 3 == 0) {
                echo 'Fizz';
            }
            else {
                echo $i;
            }
            echo '<br>';
        }
    }
?>