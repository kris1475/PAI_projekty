@extends('layouts.app')

@section('content')

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