<?php
$currentPage = "home";
?>

<?php include('html/head.php');
include('includes/functions.php');
?>

<h1>Amber's Awesome Calculator</h1>

<?php

$numOneErr = "";
$numTwoErr = "";
$numbersAreValid = true;

if (formHasBeenSubmitted()) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    $numOneErr = numError('num1');
    $numTwoErr = numError('num2');

    if (numberHasError('num1') || numberHasError('num2')) {
        $numbersAreValid = false;
        echo '<span class="failure-message">No calculation possible - please try again</span><br/><br/>';
    } else {
        echo '<strong class="success-message">Top choice of numbers matey</strong><br/><br/>';
    }

//    if ($numbersAreValid) {
//        $answer = multiplyNumbers($num1, $num2);
//    }

//    if ($numbersAreValid && $_POST['submit'] && $calculation = 'subtract' == $_POST['calculation']) {
//        $answer = subtractNumbers($num1, $num2);
//}

    if ($numbersAreValid && $_REQUEST['calculation'] == 'add') {
        $answer = addNumbers($num1, $num2);
    } elseif ($numbersAreValid && $_REQUEST['calculation'] == 'subtract') {
        $answer = subtractNumbers($num1, $num2);
    } elseif ($numbersAreValid && $_REQUEST['calculation'] == 'multiply') {
        $answer = multiplyNumbers($num1, $num2);
    } elseif ($numbersAreValid && $_REQUEST['calculation'] == 'divide') {
        $answer = divideNumbers($num1, $num2);
    }

}


//    if ($_POST['submit']) {
//        $calculation = $_POST['calculation'];
//}


?>

<form class="calculator" method="post" action="">

    <input type="text" name="num1" value="<?php echo $num1; ?>">
    <?php if (!empty($numOneErr)): ?>
        <span class="error"><?php echo $numOneErr; ?></span>
    <?php endif; ?>
    &nbsp;

    <select id="calculation" name="calculation">
        <option value="add" <?php if ($_POST['calculation'] == 'add') echo 'selected="selected"'; ?>>+</option>
        <option value="subtract" <?php if ($_POST['calculation'] == 'subtract') echo 'selected="selected"'; ?>>-</option>
        <option value="multiply" <?php if ($_POST['calculation'] == 'multiply') echo 'selected="selected"'; ?>>*</option>
        <option value="divide" <?php if ($_POST['calculation'] == 'divide') echo 'selected="selected"'; ?>>÷</option>
    </select> &nbsp;


    <br/>
    <input type="text" name="num2" value="<?php echo $num2; ?>">
    <?php if (!empty($numTwoErr)): ?>
        <span class="error"><?php echo $numTwoErr; ?></span>
    <?php endif; ?>

    <p>
    <div class='form-row'>
       &nbsp; <button type="submit" name="submit">Submit</button>
    </div>
    </p>
</form>


<?php if (!empty($answer)): ?>
    <div class="">
        <span class="answer-message">The answer is:&nbsp</span> <?php echo $answer; ?>
    </div>
<?php endif; ?>

<?php include('html/foot.php'); ?>