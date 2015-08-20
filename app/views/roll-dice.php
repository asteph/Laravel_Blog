<?php 
	$randomNumber = mt_rand(1, 6);
	$result = $randomNumber == $guess ? 'You win!': 'You lose!';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Roll Dice</title>
</head>
<body>
	<h1><?= $result ?></h1>
	<p>Your Guess: <?= $guess ?></p>
	<p>Random Number: <?= $randomNumber ?></p>

</body>
</html>