<?php
$currentPage = "home";
include('includes/functions.php');
?>

<?php

$numOneErr = "";
$numTwoErr = "";
$numbersAreValid = true;
$calculation = '';
$noCalcPoss = '';
$calcSuccess = '';
$failMessage = 'No calculation possible - please try again';
$successMessage = 'Top choice of numbers matey';


if (formHasBeenSubmitted()) {

    if (isset($_POST['calculation'])) {
        $calculation = $_POST['calculation'];
    }

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];



    $numOneErr = numError('num1');
    $numTwoErr = numError('num2');


    //@todo store message and message type in variable and display in view


    if (numberHasError('num1') || numberHasError('num2')) {
        $numbersAreValid = false;
        $noCalcPoss = $failMessage;
    } else {
        $calcSuccess = $successMessage;
    }

    if($numbersAreValid) {
        $answer = differentCalculations($calculation, $num1, $num2);
    }
}

?>

<!-- End of Business Logic -->

<!-- Start of View Logic -->

<?php include('html/head.php'); ?>

    <h1>Amber's Awesome Calculator</h1>

<?php  if (formHasBeenSubmitted()) {
    echo '<span class="success-message">' . $calcSuccess . '</span>';
    echo '<span class="failure-message">' . $noCalcPoss . '</span><br/><br/>'; }
   ?>

    <form class="calculator" method="post" action="">

        <input type="text" name="num1" value="<?php echo $num1; ?>">
        <?php if (!empty($numOneErr)): ?>
            <span class="error"><?php echo $numOneErr; ?></span>
        <?php endif; ?>
        &nbsp;

        <select id="calculation" name="calculation">
            <option value="add" <?php if ($calculation == 'add') echo 'selected="selected"'; ?>>+</option>
            <option value="subtract" <?php if ($calculation == 'subtract') echo 'selected="selected"'; ?>>-
            </option>
            <option value="multiply" <?php if ($calculation == 'multiply') echo 'selected="selected"'; ?>>*
            </option>
            <option value="divide" <?php if ($calculation == 'divide') echo 'selected="selected"'; ?>>÷
            </option>
        </select> &nbsp;

        <br/>
        <input type="text" name="num2" value="<?php echo $num2; ?>">
        <?php if (!empty($numTwoErr)): ?>
            <span class="error"><?php echo $numTwoErr; ?></span>
        <?php endif; ?>

        <p>
        <div class='form-row'>
            &nbsp;
            <button type="submit" name="submit">Submit</button>
        </div>
        </p>
    </form>

<!-- changed "!empty" to "isset" here because the "$answer = 0 was being evaluated as empty and the answer was not displayed in the view -->

<?php if (isset($answer)): ?>
    <div class="">
        <span class="answer-message">The answer is:&nbsp</span> <?php echo $answer; ?>
    </div>
<?php endif; ?>

<?php include('html/foot.php'); ?>