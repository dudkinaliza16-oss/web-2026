<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST) {
        $name = $_POST['year'];
        $isDigit = 1;
        for ($i = 0; $i < strlen($name); $i++) {
            if (($name[$i] < 0) || ($name[$i] > 9)) {
                $isDigit = 0;
            }
        }
        if (($name <= 30000) && ($name > 0) && ($isDigit)) {
            if ((($name % 4 == 0) && ($name % 100) != 0) || (($name % 400) == 0)) {
                print($name . " - год високосный");
            } else {
                print($name . " - год НЕ високосный");
            }
        } else {
            print("Не верный ввод :( Попробуйте ещё раз");
        }
    }
}

