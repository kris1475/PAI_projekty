<!DOCTYPE HTML>
<html>

<head>

<meta charset="utf-8">
<title>Kalkulator kredytowy</title>

<link rel="stylesheet" href="../assets/css/main.css">

</head>

<body class="is-preload">

<div id="wrapper">

<header id="header">

<div class="content">
<div class="inner">
<span class="icon fa-calculator"></span>
<h1>Kalkulator kredytowy</h1>
</div>
</div>

<nav>
<ul>
<li><a href="#kalkulator">Kalkulator</a></li>
</ul>
</nav>

</header>

<div id="main">

<article id="kalkulator">

<h2 class="major">Kalkulator</h2>

<form method="post">

<div class="fields">

<div class="field">
<label>Kwota kredytu</label>
<input type="number" name="kwota" min="0" value="<?php echo $kwota; ?>" required>
</div>

<div class="field">
<label>Okres kredytu (lata)</label>
<input type="number" name="lata" min="1" value="<?php echo $lata; ?>" required>
</div>

<div class="field">
<label>Oprocentowanie (%)</label>
<input type="number" name="oprocentowanie" step="0.1" min="0" value="<?php echo $oprocentowanie; ?>" required>
</div>

</div>

<ul class="actions">
<li><input type="submit" value="Oblicz" class="primary"></li>
</ul>

</form>

<?php

if(!empty($messages)){
echo "<ul>";
foreach($messages as $msg){
echo "<li>".$msg."</li>";
}
echo "</ul>";
}

?>

<?php if(isset($rata) && empty($messages)){ ?>

<div class="wynik-box">

<h3>Wynik</h3>

<p>Całkowita kwota do spłaty:</p>
<h3><?php echo number_format($calkowita,2,"."," "); ?> zł</h3>

<p>Miesięczna rata:</p>
<h3><?php echo number_format($rata,2,"."," "); ?> zł</h3>

</div>

<?php } ?>

</article>

</div>

<footer id="footer">
</footer>

</div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/browser.min.js"></script>
<script src="../assets/js/breakpoints.min.js"></script>
<script src="../assets/js/util.js"></script>
<script src="../assets/js/main.js"></script>

</body>

</html>