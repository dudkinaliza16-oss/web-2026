<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST) {
        $num = $_POST["number"];
        $isDigit = 1;
        for ($i = 0; $i < strlen($num); $i++) {
            if (($num[$i] < 0) || ($num[$i] > 9)) {
                $isDigit = 0;
            }
        }
        function factorial($n): int
        {
            if ($n == 0 or $n == 1) {
                return 1;
            } else {
                if ($n * factorial($n - 1) > PHP_INT_MAX){
                    return -1;
                }
                return $n * factorial($n - 1);
            }
        }

        if ($isDigit and ($num >= 0) and ($num <= PHP_INT_MAX and factorial($num) > 0)) {
            print(factorial($num));

        } else {
            print('Некорректный ввод');
        }

    }
}



