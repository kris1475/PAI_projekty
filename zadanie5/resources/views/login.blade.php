@extends('layouts.app')

@section('content')

<h2 class="major">Logowanie</h2>

@if(isset($error))
<p style="color:red;">{{ $error }}</p>
@endif

<form method="POST">
@csrf

<div class="fields">

<div class="field">
<label>Login</label>
<input type="text" name="login">
</div>

<div class="field">
<label>Hasło</label>
<input type="password" name="haslo">
</div>

</div>

<ul class="actions">
<li><input type="submit" value="Zaloguj" class="primary"></li>
</ul>

</form>

@endsection