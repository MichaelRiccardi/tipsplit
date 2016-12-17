<?php

function outputTipPercentageRadioButtons($tipPercentageOptions)
{
    foreach ($tipPercentageOptions as &$tipPercentage)
    {
        echo "<input type='radio' name='tipPercentage' value='{$tipPercentage}'>{$tipPercentage}% ";
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

            <p>Bill subtotal:  $<input name="subtotal" type="number"></p>

            <p>Tip percentage: <?php outputTipPercentageRadioButtons([ 10, 15, 20 ]); ?>
            
            </p>
                
            <p><input type="submit" value="Submit"></p>
                
        </form>
    </body>
</html>

