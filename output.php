<?php

class Output
{
    private static function toMoneyFormat($number)
    {
        return '$' . number_format($number, 2);
    }
    
    public static function subtotal()
    {
        echo Validator::validSubtotal() ? $_POST["subtotal"] : "";
    }
    
    public static function split()
    {
        echo Validator::validSplit() ? $_POST["split"] : 1;
    }
    

    public static function radioButtons($tipPercentageOptions, $defaultValue)
    {
        $selectedValue = isset($_POST["tipPercentage"]) ? $_POST["tipPercentage"] : $defaultValue;

        foreach ($tipPercentageOptions as &$tipPercentage)
        {
            $isSelected = ($tipPercentage == $selectedValue) ? " checked" : "";
            echo "<input type='radio' name='tipPercentage' value='{$tipPercentage}'{$isSelected}>{$tipPercentage}% ";
        }       
        unset($tipPercentage);
    }

    public static function tipAndTotal()
    {
        if(Validator::validInputs())
        {
            $tip = $_POST["subtotal"] * $_POST["tipPercentage"] / 100;
            $total = $_POST["subtotal"] + $tip;
            $split = $_POST["split"];

            $displayTip = Output::toMoneyFormat($tip);
            $displayTotal = Output::toMoneyFormat($total);

            echo "Tip: {$displayTip}<br>Total: {$displayTotal}";
            
            if($split > 1)
            {
                $splitTip = $tip / $split;
                $splitTotal = $total / $split;
                
                $displaySplitTip = Output::toMoneyFormat($splitTip);
                $displaySplitTotal = Output::toMoneyFormat($splitTotal);
                
                echo "<br><br>Tip each: {$displaySplitTip}<br>Total each: {$displaySplitTotal}";
            }
        }
    }
    
    public static function errorMessage()
    {
        echo Validator::getErrorMessage();
    }
}

?>