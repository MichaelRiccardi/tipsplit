<?php

function getErrorMessage()
{
    $formSubmitted = $_SERVER['REQUEST_METHOD'] == 'POST';
    $validSubtotal = isset($_POST["subtotal"]) && is_numeric($_POST["subtotal"]) && ($_POST["subtotal"] > 0);
    $validTipPercentage = isset($_POST["tipPercentage"]) && is_numeric($_POST["tipPercentage"]);
        
    if(!$formSubmitted)
    {
        return "";
    }
    else if(!$validSubtotal && !$validTipPercentage)
    {
        return "Please specify a valid subtotal and tip percentage.";
    }
    else if(!$validSubtotal)
    {
        return "Please specify a valid subtotal.";
    }
    else if(!$validTipPercentage)
    {
        return "Please select a tip percentage.";
    }
    else
    {
        return false;
    }
}

function validInputs()
{
    return (getErrorMessage() === false);
}

function outputSubtotal()
{
    if(isset($_POST["subtotal"]))
    {
        $validSubtotal = isset($_POST["subtotal"]) && is_numeric($_POST["subtotal"]) && ($_POST["subtotal"] > 0);
        if($validSubtotal)
        {
            echo $_POST["subtotal"];
        }
    }
}

function outputTipPercentageRadioButtons($tipPercentageOptions, $defaultValue)
{
    $selectedValue = isset($_POST["tipPercentage"]) ? $_POST["tipPercentage"] : $defaultValue;
    
    foreach ($tipPercentageOptions as &$tipPercentage)
    {
        $isSelected = ($tipPercentage == $selectedValue) ? " checked" : "";
        echo "<input type='radio' name='tipPercentage' value='{$tipPercentage}'{$isSelected}>{$tipPercentage}% ";
    }       
    unset($tipPercentage);
}

function toMoneyFormat($number)
{
    return '$' . number_format($number, 2);
}

function outputTipAndTotal()
{
    if(validInputs())
    {
        $tip = $_POST["subtotal"] * $_POST["tipPercentage"] / 100;
        $total = $_POST["subtotal"] + $tip;
    
        $displayTip = toMoneyFormat($tip);
        $displayTotal = toMoneyFormat($total);
        
        echo "Tip: {$displayTip}<br>Total: {$displayTotal}";
    }
}

?>

<html>    
    <head>
        <title>tipsplit - PHP Tip Calculator</title>
    </head>
    
    <body>
        <form method="post">
            <h1>tipsplit</h1>
            <h3><?php echo getErrorMessage() ?></h3>

            <p>Bill subtotal:  $<input name="subtotal" type="text" step="any" value="<?php outputSubtotal() ?>"></p>

            <p>Tip percentage: <?php outputTipPercentageRadioButtons([ 10, 15, 20 ], 15); ?>
            
            </p>
            
            <p><input type="submit" value="Submit"></p>
            
            <p><?php outputTipAndTotal(); ?></p>
                
        </form>
    </body>
</html>

