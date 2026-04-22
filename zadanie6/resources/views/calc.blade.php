@extends('layouts.app')

@section('content')
<strong style="color: {{ session('role') == 'admin' ? '#00ffcc' : '#ffcc00' }}">
    {{ session('role') }}
</strong>
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">

    <div>
        Rola: <strong>{{ session('role') }}</strong>
    </div>

    <a href="/logout" class="button primary">Wyloguj</a>

</div>

<hr>

<h2 class="major">Kalkulator</h2>

<form method="POST">
@csrf

<div class="fields">

<div class="field">
<label>Kwota kredytu</label>
<input type="number" name="kwota" min="0" value="{{ $kwota ?? '' }}">
</div>

<div class="field">
<label>Okres kredytu (lata)</label>
<input type="number" name="lata" min="1" value="{{ $lata ?? '' }}">
</div>

<div class="field">
<label>Oprocentowanie (%)</label>
<input type="number" step="0.1" name="oprocentowanie" min="0" value="{{ $oprocentowanie ?? '' }}">
</div>

</div>

<ul class="actions">
<li><input type="submit" value="Oblicz" class="primary"></li>
</ul>

</form>

@if(session('role') == 'user')
<p style="color: orange; margin-top:10px;">
    Maksymalna kwota dla usera: 10 000 zł
</p>
@endif

@if(session('role') == 'admin')
<p style="color: lightgreen; margin-top:10px;">
    Masz pełny dostęp (admin)
</p>
@endif

@if(!empty($messages))
<ul>
@foreach($messages as $msg)
<li>{{ $msg }}</li>
@endforeach
</ul>
@endif

@if(isset($rata) && empty($messages))

<div class="wynik-box">

<h3>Wynik</h3>

<p>Całkowita kwota do spłaty:</p>
<h3>{{ number_format($calkowita,2,"."," ") }} zł</h3>

<p>Miesięczna rata:</p>
<h3>{{ number_format($rata,2,"."," ") }} zł</h3>

</div>

@endif

@endsection