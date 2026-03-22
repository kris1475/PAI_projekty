<?php

require_once __DIR__ . '/../config.php';

$kwota = null;
$lata = null;
$oprocentowanie = null;

$rata = null;
$calkowita = null;

$messages = [];

if(isset($_POST['kwota'])){

    $kwota = $_POST['kwota'];
    $lata = $_POST['lata'];
    $oprocentowanie = $_POST['oprocentowanie'];

    if($kwota == "") $messages[] = "Nie podano kwoty kredytu";
    if($lata == "") $messages[] = "Nie podano liczby lat";
    if($oprocentowanie == "") $messages[] = "Nie podano oprocentowania";

    if(empty($messages)){

        if(!is_numeric($kwota)) $messages[] = "Kwota musi być liczbą";
        if(!is_numeric($lata)) $messages[] = "Lata muszą być liczbą";
        if(!is_numeric($oprocentowanie)) $messages[] = "Oprocentowanie musi być liczbą";

        if($kwota < 0) $messages[] = "Kwota nie może być ujemna";
        if($lata <= 0) $messages[] = "Liczba lat musi być większa od 0";
        if($oprocentowanie < 0) $messages[] = "Oprocentowanie nie może być ujemne";

    }

    if(empty($messages)){

        $kwota = floatval($kwota);
        $lata = floatval($lata);
        $oprocentowanie = floatval($oprocentowanie);

        $oprocentowanie_calk = $oprocentowanie * $lata;

        $calkowita = $kwota * (1 + $oprocentowanie_calk/100);

        $miesiace = $lata * 12;

        $rata = $calkowita / $miesiace;
    }
}

$smarty->assign('kwota',$kwota);
$smarty->assign('lata',$lata);
$smarty->assign('oprocentowanie',$oprocentowanie);
$smarty->assign('rata',$rata);
$smarty->assign('calkowita',$calkowita);
$smarty->assign('messages',$messages);

$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Oblicz ratę kredytu');

$smarty->display('calc.html');