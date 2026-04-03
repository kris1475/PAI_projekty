<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    public function index()
    {
        return view('calc', [
            'page_title' => 'Kalkulator kredytowy',
            'page_description' => 'Oblicz ratę kredytu'
        ]);
    }

    public function calculate(Request $request)
    {
        $messages = [];

        $kwota = $request->input('kwota');
        $lata = $request->input('lata');
        $oprocentowanie = $request->input('oprocentowanie');

        if ($kwota == "") $messages[] = "Nie podano kwoty kredytu";
        if ($lata == "") $messages[] = "Nie podano liczby lat";
        if ($oprocentowanie == "") $messages[] = "Nie podano oprocentowania";

        if (empty($messages)) {

            if (!is_numeric($kwota)) $messages[] = "Kwota musi być liczbą";
            if (!is_numeric($lata)) $messages[] = "Lata muszą być liczbą";
            if (!is_numeric($oprocentowanie)) $messages[] = "Oprocentowanie musi być liczbą";

            if ($kwota < 0) $messages[] = "Kwota nie może być ujemna";
            if ($lata <= 0) $messages[] = "Liczba lat musi być większa od 0";
            if ($oprocentowanie < 0) $messages[] = "Oprocentowanie nie może być ujemne";
        }

        $rata = null;
        $calkowita = null;

        if (empty($messages)) {

            $kwota = floatval($kwota);
            $lata = floatval($lata);
            $oprocentowanie = floatval($oprocentowanie);

            $oprocentowanie_calk = $oprocentowanie * $lata;

            $calkowita = $kwota * (1 + $oprocentowanie_calk/100);

            $miesiace = $lata * 12;

            $rata = $calkowita / $miesiace;
        }

        return view('calc', compact(
            'kwota','lata','oprocentowanie','rata','calkowita','messages'
        ) + [
            'page_title' => 'Kalkulator kredytowy',
            'page_description' => 'Oblicz ratę kredytu'
        ]);
    }
}