<?php

function outputSubtotal()
{
    if(isset($_POST["subtotal"]))
    {
        echo $_POST["subtotal"];
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

?>

<html>    
    <head>
        <title>tipsplit - PHP Tip Calculator</title>
    </head>
    
    <body>
        <form method="post">
            <h1>tipsplit</h1>

            <p>Bill subtotal:  $<input name="subtotal" type="number" step="any" value="<?php outputSubtotal() ?>"></p>

            <p>Tip percentage: <?php outputTipPercentageRadioButtons([ 10, 15, 20 ], 15); ?>
            
            </p>
                
            <p><input type="submit" value="Submit"></p>
                
        </form>
    </body>
</html>

