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
    
    public static function discountedSubtotal()
    {
        echo Validator::validDiscountedSubtotal() ? $_POST["discountedSubtotal"] : "";
    }
    
    public static function split()
    {
        echo Validator::validSplit() ? $_POST["split"] : 1;
    }    

    public static function discountRadioButtons()
    {
        $yes = (isset($_POST["discount"]) && $_POST["discount"] == "Yes") ? " checked" : "";
        $no = (!isset($_POST["discount"]) || $_POST["discount"] == "No") ? " checked" : "";
        
        echo "<label class='radio-inline'>
                    <input type='radio' onchange='updateDiscountFields()' name='discount' id='discountYes' value='Yes'{$yes}> Yes
              </label>
              <label class='radio-inline'>
                    <input type='radio' onchange='updateDiscountFields()' name='discount' id='discountNo' value='No'{$no}> No
              </label>";
    }
    
    public static function tipPercentageRadioButtons($tipPercentageOptions, $defaultValue)
    {
        $selectedValue = isset($_POST["tipPercentage"]) ? $_POST["tipPercentage"] : $defaultValue;
        
        $customSelection = true;

        foreach ($tipPercentageOptions as &$tipPercentage)
        {
            $isSelected = ($tipPercentage == $selectedValue) ? " checked" : "";
            echo "<label class='radio-inline'>
                    <input type='radio' name='tipPercentage' value='{$tipPercentage}'{$isSelected}> {$tipPercentage}%
                  </label>";            
            if($isSelected)
            {
                $customSelection = false;
            }
        }               
        unset($tipPercentage);
    }
    
    public static function customTipChecked() 
    {
        echo Validator::useCustomTipPercentage() ? " checked" : "";
    }
    
    public static function customTipPercentage()
    {
        echo Validator::validCustomTipPercentage() ? $_POST["customTipPercentage"] : "";
    }

    public static function tipAndTotal()
    {
        $calculated = Calculator::tipAndTotal();
        
        if($calculated)
        {
            echo '<div class="container tipContainer align-middle text-center">';
            
            $displayTip = Output::toMoneyFormat($calculated["tip"]);
            $displayTotal = Output::toMoneyFormat($calculated["total"]);
            //echo "Tip: {$displayTip}<br>Total: {$displayTotal}";

            if(isset($calculated["splitTip"]) && isset($calculated["splitTotal"]))
            {
                echo "<div class='col-xs-6'>Tip: {$displayTip}<br>Total: {$displayTotal}</div>";
                
                $displaySplitTip = Output::toMoneyFormat($calculated["splitTip"]);
                $displaySplitTotal = Output::toMoneyFormat($calculated["splitTotal"]);
                
                echo "<div class='col-xs-6'>Tip each: {$displaySplitTip}<br>Total each: {$displaySplitTotal}</div>";
            }
            else
            {
                echo "<div class='col-xs-12'>Tip: {$displayTip}<br>Total: {$displayTotal}</div>";
            }
            
            echo '</div>';
        }
    }
    
    public static function errorMessage()
    {
        echo Validator::getErrorMessage();
    }
}

?>