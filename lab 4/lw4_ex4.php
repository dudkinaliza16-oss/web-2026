<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET) {
        $start = $_GET['start'] . PHP_EOL;
        $finish = $_GET['finish'] . PHP_EOL;
        function stringToArray($str): int
        {
            $i = 0;
            while ($str[$i] !== null) {
                if ($str[$i] === "\n") {
                    break;
                }
                $i++;
            }
            return $i - 1;
        }
        function sumOfThreeElem($a, $b, $s): int
        {
            return (int)$a + (int)$b + (int)$s;
        }
        function getNumLenSix($num): string
        {
            $str = $num . PHP_EOL;
            while (stringToArray($str) < 6) {
                $str = "0" . $str;
            }
            return $str;
        }
        if ((stringToArray($start) !== 6) || (stringToArray($finish) !== 6)) {
            print("Некорректный ввод");
        } else {
            for ($i = (int)$start; $i <= (int)$finish; $i++) {
                $s = getNumLenSix($i);
                if (sumOfThreeElem($s[0], $s[1], $s[2]) === sumOfThreeElem($s[3], $s[4], $s[5])) {
                    print($s . "<br>");
                }
            }
        }
    }
}
