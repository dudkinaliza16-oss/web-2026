<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST) {
        $name = $_POST['date'];
        $isDigit = 1;
        $partIndex = 1;
        $isError = 0;
        $part1 = "";
        $part2 = "";
        $part3 = "";

        for ($i = 0; $i < strlen($name); $i++) {
            $ch = $name[$i];
            if (($ch < '0') || ($ch > '9')) {
                $partIndex++;
                if (($ch != ' ') && ($ch != '-') && ($ch != '/') && ($ch != '.')) {
                    $isError = 1;
                }
            } else {
                if ($partIndex == 1) {
                    $part1 = $part1 . $ch;
                } else if ($partIndex == 2) {
                    $part2 = $part2 . $ch;
                } else if ($partIndex == 3) {
                    $part3 = $part3 . $ch;
                }
            }
        }
        if ($isError || $part1 == "" || $part2 == "" || $part3 == "") {
            print("Некорректный ввод");
        } else {
            function toNumber($str)
            {
                $number = 0;
                for ($i = 0; $i < strlen($str); $i++) {
                    $number = $number * 10 + (int)$str[$i];
                }
                return $number;
            }

            $part1 = toNumber($part1);
            $part2 = toNumber($part2);
            $part3 = toNumber($part3);

            if ($part1 > 12) {
                $day = $part1;
                $month = $part2;
            } elseif ($part2 > 12) {
                $day = $part2;
                $month = $part1;
            } else {
                $day = $part1;
                $month = $part2;
            }
            $year = $part3;
            function isLeapYear($year): int
            {
                if ((($year % 4 == 0) && ($year % 100) != 0) || (($year % 400) == 0)) {
                    return 1;
                }
                return 0;
            }

            if (($month == 1 && $day >= 20 && $day <= 31) || ($month == 2 && $day >= 1 && $day <= 18)) {
                echo "Водолей";
            } elseif (($month == 2 && $day >= 19 && (($day <= 29 && isLeapYear($year) || ($day <= 28 && !isLeapYear($year))))) || ($month == 3 && $day >= 1 && $day <= 20)) {
                echo "Рыбы";
            } elseif (($month == 3 && $day >= 21 && $day <= 31) || ($month == 4 && $day >= 1 && $day <= 19)) {
                echo "Овен";
            } elseif (($month == 4 && $day >= 20 && $day <= 30) || ($month == 5 && $day >= 1 && $day <= 20)) {
                echo "Телец";
            } elseif (($month == 5 && $day >= 21 && $day <= 31) || ($month == 6 && $day >= 1 && $day <= 20)) {
                echo "Близнецы";
            } elseif (($month == 6 && $day >= 21 && $day <= 30) || ($month == 7 && $day >= 1 && $day <= 22)) {
                echo "Рак";
            } elseif (($month == 7 && $day >= 23 && $day <= 31) || ($month == 8 && $day >= 1 && $day <= 22)) {
                echo "Лев";
            } elseif (($month == 8 && $day >= 23 && $day <= 31) || ($month == 9 && $day >= 1 && $day <= 22)) {
                echo "Дева";
            } elseif (($month == 9 && $day >= 23 && $day <= 30) || ($month == 10 && $day >= 1 && $day <= 22)) {
                echo "Весы";
            } elseif (($month == 10 && $day >= 23 && $day <= 31) || ($month == 11 && $day >= 1 && $day <= 21)) {
                echo "Скорпион";
            } elseif (($month == 11 && $day >= 22 && $day <= 30) || ($month == 12 && $day >= 1 && $day <= 21)) {
                echo "Стрелец";
            } elseif (($month == 12 && $day >= 22 && $day <= 31) || ($month == 1 && $day >= 1 && $day <= 19)) {
                echo "Козерог";
            } else {
                echo "Некорректная дата";
            }
        }
    }
}