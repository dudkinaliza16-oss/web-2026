<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET) {
        $num = $_GET["number"];
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
                return $n * factorial($n - 1);
            }
        }

        if ($isDigit and $num) {
            print(factorial($num));
        } else {
            print('Некорректный ввод');
        }

    }
}


