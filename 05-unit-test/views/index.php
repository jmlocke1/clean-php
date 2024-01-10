<?php
require_once __DIR__."/../config/app.php";
use Helpers\Math;


$math = new Math(10, 3);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calculadora</title>
</head>
<body>
	<h1>Calculadora.</h1>

	<h3>Suma: <?php $math->viewSum('+'); ?></h3>
	<h3>Resta: <?php $math->viewSum('-'); ?></h3>
	<h3>Multiplicación</h3>
	<h3>División</h3>
</body>
</html>