<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kalkulator kredytowy</title>
</head>

<body>

<h2>Kalkulator kredytowy</h2>

<form method="post">

<label>Kwota kredytu:</label><br>
<input type="number" name="kwota" min="0" value="<?php echo $kwota; ?>"><br><br>

<label>Okres kredytu (lata):</label><br>
<input type="number" name="lata" min="1" value="<?php echo $lata; ?>"><br><br>

<label>Oprocentowanie (%):</label><br>
<input type="number" step="0.1" name="oprocentowanie" min="0" value="<?php echo $oprocentowanie; ?>"><br><br>

<label>Waluta:</label><br>

<select name="waluta">
<option value="PLN">PLN</option>
<option value="EUR">EUR</option>
<option value="USD">USD</option>
</select>

<br><br>

<input type="submit" value="Oblicz">

</form>

<br>

<?php

if(!empty($messages)){

echo "<ul>";

foreach($messages as $msg){

echo "<li>".$msg."</li>";

}

echo "</ul>";

}

?>

<?php if(isset($rata)){ ?>

<h3>Wynik</h3>

Całkowita kwota do spłaty:<br>
<?php echo number_format($calkowita,2,"."," ")." ".$waluta; ?>

<br><br>

Miesięczna rata:<br>
<?php echo number_format($rata,2,"."," ")." ".$waluta; ?>

<?php } ?>

</body>
</html>
