<?php
    function my_array_sort(array $arrayToSort, string $order) : array {

        $change = 0;

        for($i = 0; ; $i++) {
            if (!isset($arrayToSort[$i+1])) {
                if ($change == 0) {
                   break;
                }
                $i = 0;
                $change = 0;
            }

            switch ($order) {
                case 'ASC':
                    $condition = ($arrayToSort[$i] > $arrayToSort[$i+1]);
                    break;
                case 'DESC':
                    $condition = ($arrayToSort[$i] < $arrayToSort[$i+1]);
                    break;
                default:
                    $condition = false;
            }

            if ($condition) {
                $tmp = $arrayToSort[$i]; 
                $arrayToSort[$i] = $arrayToSort[$i+1];
                $arrayToSort[$i+1] = $tmp;

                $change++;
            }
        }

        return $arrayToSort;
    }
?>