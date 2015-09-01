<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/calculator.css">
	<title>Calculator</title>

</head>
<body>
	<main>
    <div class="calculatorBody">
  		<form method="post">
  		<input type="text" id="leftOperand" value="" placeholder="value" class="operand" name="left operand" readonly>
  		<input type="text" id="operator" value="" placeholder="+ - * /" class="operator" name="operator" readonly>
  		<input type="text" id="rightOperand" value="" placeholder="value" class="operand" name="right" readonly>
  		</form>
  		<p class="clearfix">
  			<button id="1" type="button" class="number" value="1">1</button>
  			<button id="2" type="button" class="number" value="2">2</button>
  			<button id="3" type="button" class="number" value="3">3</button>
  			<button id="+" type="button" value="+">+</button>
  		</p>
  		<p class="clearfix">
  			<button id="4" type="button" class="number" value="4">4</button>
  			<button id="5" type="button" class="number" value="5">5</button>
  			<button id="6" type="button" class="number" value="6">6</button>
  			<button id="-" type="button" value="-">-</button>
  		</p>
  		<p class="clearfix">
  			<button id="7" type="button" class="number" value="7">7</button>
  			<button id="8" type="button" class="number" value="8">8</button>
  			<button id="9" type="button" class="number" value="9">9</button>
  			<button id="*" type="button" value="*">*</button>
  		</p>
  		<p class="clearfix">
  			<button id="C" type="button" value="C">C</button>
  			<button id="0" type="button" class="number" value="0">0</button>
  			<button id="equals" type="button" value="=">=</button>
  			<button id="/" type="button" value="/">/</button>
  		</p>  
    </div>
	</main>
<script>
    (function() {
        //retrieve leftbox, centerbox, rightbox, and buttons from document
      	var leftOperand = document.getElementById('leftOperand');
      	var operator = document.getElementById('operator');
      	var rightOperand = document.getElementById('rightOperand');
      	var buttons = document.getElementsByTagName('button');
      	//beforeOperator checks to see if an operator has been click
        //if true: numbers are concatinated to the left box
        //if false: numbers are concatinated to the right box
      	var beforeOperator = true;
        //result holds anser after the operation is done in doTheMath()
      	var result;
        //this function is called if the '=' button is clicked and does the calculations
        //on the left and right box and returns the anser to the first box before clearing
        //the middle and last box
        var doTheMath = function(operator){
            if(operator == '+'){
            var result =  parseInt(leftOperand.value) + parseInt(rightOperand.value);
            }else if(operator == '-'){
            var result =  parseInt(leftOperand.value) - parseInt(rightOperand.value);
            }else if(operator == '*'){
            var result =  parseInt(leftOperand.value) * parseInt(rightOperand.value);
            }else if(operator == '/'){
            var result =  parseInt(leftOperand.value) / parseInt(rightOperand.value);
            }
            leftOperand.value = result;     //returns result to left box
            rightOperand.value = '';        //clears out right box
        }
        //Each button click will trigger this function which checks for clear, which box
        //should be targeted, operators, or equals and acts accordingly
        //this.value allows for only the value of the element being considered to be targeted
      	var displayClickedButton = function(){
            if(this.value == 'C'){      //clears and resets to entering values in leftbox
              	leftOperand.value = '';
              	operator.value = '';
              	rightOperand.value = '';
              	beforeOperator = true;
            }		
      		if(beforeOperator){            //checks to see if beforeOperator is true
      			if(this.value % 1 == 0){     //checks to see if a number was entered
            		leftOperand.value += this.value;
          	}else{
          		if(this.value == '+' || this.value == '-' || this.value == '*' || this.value == '/'){
          			operator.value += this.value;
            		beforeOperator = false;  //pushes numbers to right box if single operator is clicked
          		}
          	}
            }else{                         //this runs if the beforeOperator is false
                if(this.value % 1 == 0){     //checks to see if a number was clicked
          		    rightOperand.value += this.value;
                }else if(this.value == '='){    //only allows = to be clicked after putting #s in 2nd box
            	   doTheMath(operator.value);       //runs the doTheMath function that preforms the math operations
            	   operator.value ='';           //clears the operator.value after, since it is an doTheMath parameter
            	   beforeOperator = true;  //resets so that numbers are entered into left box
                }
            }
        }
        //assigns listener to each button and when clicked runs displayClickedButton on that element
      	for (var i = 0; i < buttons.length; i++) {
      		buttons[i].addEventListener('click', displayClickedButton, false);
      	}
    })();   
</script>	
	
</body>
</html>