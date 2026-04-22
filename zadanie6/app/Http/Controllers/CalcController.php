<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalcController extends Controller
{
    public function index(Request $request)
    {
        if (!session()->has('role')) {
            return redirect('/login');
        }

        return view('calc', [
            'page_title' => 'Kalkulator kredytowy',
            'page_description' => 'Oblicz ratę kredytu'
        ]);
    }

    public function calculate(Request $request)
    {
        if (!session()->has('role')) {
            return redirect('/login');
        }

        $messages = [];

        $kwota = $request->input('kwota');
        $lata = $request->input('lata');
        $oprocentowanie = $request->input('oprocentowanie');

        $role = session('role');

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

            // ograniczenie dla usera
            if ($role == 'user' && $kwota > 10000) {
                $messages[] = "Tylko admin może liczyć kredyty powyżej 10 000 zł";
            }
        }

        $rata = null;
        $calkowita = null;

        if (empty($messages)) {

            $kwota = floatval($kwota);
            $lata = floatval($lata);
            $oprocentowanie = floatval($oprocentowanie);

            $oprocentowanie_calk = $oprocentowanie * $lata;

            $calkowita = $kwota * (1 + $oprocentowanie_calk / 100);

            $miesiace = $lata * 12;

            $rata = $calkowita / $miesiace;
        }

        return view('calc', compact(
            'kwota', 'lata', 'oprocentowanie', 'rata', 'calkowita', 'messages'
        ) + [
            'page_title' => 'Kalkulator kredytowy',
            'page_description' => 'Oblicz ratę kredytu'
        ]);
    }


    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $login = $request->input('login');
        $haslo = $request->input('haslo');

        $user = DB::table('users')
            ->where('login', $login)
            ->where('password', $haslo)
            ->first();

        if ($user) {
            session(['role' => $user->role]);
            return redirect('/');
        }

        return view('login', ['error' => 'Błędny login lub hasło']);
    }

    public function logout()
    {
        session()->forget('role');
        return redirect('/login');
    }
}