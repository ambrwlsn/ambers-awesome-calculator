<?php

//this function takes two inputs and adds them together (provided they are numbers)
function addNumbers($num1, $num2)
{
    $z = $num1 + $num2;
    return $z;
}

//this function takes two inputs and subtracts them (provided they are numbers)
function subtractNumbers($num1, $num2)
{
    return $num1 - $num2;
}

//this function takes two inputs and multiplies them together (provided they are numbers)
function multiplyNumbers($num1, $num2)
{
    return $num1 * $num2;
}

//this function takes two inputs and divides them (provided they are numbers)
function divideNumbers($num1, $num2)
{
    return $num1 / $num2;
}

$num1 = "";
$num2 = "";

//this function can detect if the "POST" request method has been activated
function formHasBeenSubmitted()
{
    return $_SERVER["REQUEST_METHOD"] == "POST";
}


//this function takes data and runs sanitisation methods on it, then outputs the sanitised result
/**
 *
 * @param $data
 * @return string
 */
function sanitiseInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


/**
 *
 * @param $numericCharacter
 * @return bool
 *
 */
function numberHasError($numericCharacter)
{
    if (empty($_POST[$numericCharacter])) {
        return true;
    } else {
        $unSanitisedName = $_POST[$numericCharacter];
        $name = sanitiseInput($unSanitisedName);
        // check if name only contains letters and whitespace
        if (!is_numeric($name)) {
            return true;
        }
    }
    //name is valid as no error has been returned
    return false;
}


//this function detects whether the input is a number and if it isn't, returns 'NaN'
  function numError($num)
  {
      if (numberHasError($num)) {
          return '&nbspNaN&nbsp';
      }
      return '';
  }

  //I want this function to select the ID of each calculation option and relate it to a relevant function
function differentCalculations($calculation, $num1, $num2)
{

    //@todo refactor to use switch statement
    if ($calculation == 'add') {
        $a = addNumbers($num1, $num2);
    } elseif ($calculation == 'subtract') {
        $a = subtractNumbers($num1, $num2);
    } elseif ($calculation == 'multiply') {
        $a = multiplyNumbers($num1, $num2);
    } elseif ($calculation == 'divide') {
        $a = divideNumbers($num1, $num2);
    }
    return $a;

}