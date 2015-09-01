<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Whack-a-Mouse</title>
	<link rel="stylesheet" href="/css/whack_a_mouse.css">
</head>
<body>
	<main>
		<h1>Whack-a-Mouse</h1>
		<h3 id='highScore'>High Score: 0</h3>
		<h3 id='score'>Score: 0</h3>
		<div id="container">
			<div id="start" class="start"><h4>START!</h4></div>
			<div id="box_1" class="box"></div>
			<div id="box_2" class="box"></div>
			<div id="box_3" class="box"></div>
			<div id="box_4" class="box"></div>
			<div id="box_5" class="box"></div>
			<div id="box_6" class="box"></div>
			<div id="box_7" class="box"></div>
			<div id="box_8" class="box"></div>
			<div id="box_9" class="box"></div>
		</div>
	</main>
	<audio id="cat_meow">
	  <source src="cat_meow.wav" type="audio/wav">
	</audio>
	<audio id="long_meow">
	  <source src="30sec_meow.wav" type="audio/wav">
	</audio>
	<audio id="mouse_squeek">
	  <source src="mouse.wav" type="audio/wav">
	</audio>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	  	"use strict";
	  	var score = 0;
	  	var highScore = 0;
	  	var newRandom = 0;
	  	var timeShown = 1000;
	  	var timerInterval;
	  	var countInterval;
	  	var countdown = 30;
	  	//game audio(angry cat meow, meow throughout, mouse squeek)
	  	var playGameOver = function(){ 
			document.getElementById("cat_meow").play(); 
		};
	  	var playGameStart = function(){ 
			document.getElementById("long_meow").play(); 
		};
	  	var playMouseSqueek = function(){ 
			document.getElementById("mouse_squeek").play(); 
		};
	  	//Counts down remaining time in game in seconds
	  	var countdownTimer = function(countdown){
	  		countInterval = setInterval(function(){
	  			var showCount = '<h4>Time Remaining:<br>' + countdown + '<h4/>';
				$('#start').html(showCount);
				countdown -= 1;
			}, 1000);
	  	};
	  	//random function gets a random div and 
	  	//makes it have a class of target
		var randomTarget = function(){
			var targetBox;
			do {
			    var random = Math.ceil(Math.random() * 9);
			}
			while (random == newRandom);
			newRandom = random;
			targetBox = '#box_' + newRandom;
			$(targetBox).addClass('target');
		};
		//shows a target every second
		//disappears after one second or if clicked
		var timer = function(timeShown){
			timerInterval = setInterval(function(){
				$('.target').removeClass('target');
				randomTarget();
			}, timeShown);
		};
		//removes class of 'target' on click; adds score
		$('#container').on('click','.target', function(){
			playMouseSqueek();
			$(this).removeClass('target');
			score += 1;
			//increase speed at which boxes are shown
			clearInterval(timerInterval);
			timeShown -= 50;
			timer(timeShown);
			$('#score').html('Score: ' + score);
		});
		//START GAME on click
		$('#container').on('click','.start', function(){
			//start background audio (cat meowing)
			playGameStart();
			//show fresh score
			$('#score').html('Score: ' + score);
			$(this).html('').removeClass('start');
			//start the countdown seen by user
			countdownTimer(countdown);
			//start showing boxes
			timer(timeShown);
			//stopsInterval after 30 seconds
			//resets start button and score
			setTimeout(function(){
				clearInterval(timerInterval);
				clearInterval(countInterval);
				timeShown = 1000;
				$('.target').removeClass('target');
				$('#start').html('<h4>GAME OVER<h4/>');
				//angry meow sound
				playGameOver();
				setTimeout(function(){
					$('#start').addClass('start').html('<h4>START!<h4/>');
				}, 3000);
				if(score > highScore){
					highScore = score;
					$('#highScore').html('High Score: ' + highScore);	
				}
				score = 0;
			}, 30000);
		});
	</script>  	
</body>
</html>