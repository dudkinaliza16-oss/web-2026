<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST) {
        $name = $_POST['digit'];
        $isDigit = 1;
        switch ($name) {
            case 0:
                print($name . " - НОЛЬ");
                break;
            case 1:
                print($name . " - ОДИН");
                break;
            case 2:
                print($name . " - ДВА");
                break;
            case 3:
                print($name . " - ТРИ");
                break;
            case 4:
                print($name . " - ЧЕТЫРЕ");
                break;
            case 5:
                print($name . " - ПЯТЬ");
                break;
            case 6:
                print($name . " - ШЕСТЬ");
                break;
            case 7:
                print($name . " - СЕМЬ");
                break;
            case 8:
                print($name . " - ВОСЕМЬ");
                break;
            case 9:
                print($name . " - ДЕВЯТЬ");
                break;
            default:
                print("Не верный ввод :( Попробуйте ещё раз");
        }
    }
}