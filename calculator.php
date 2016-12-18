<?php

class Calculator
{
    public static function tipAndTotal()
    {
        if(Validator::validInputs())
        {    
            $tipPercentage = Validator::useCustomTipPercentage() ? $_POST["customTipPercentage"] : $_POST["tipPercentage"];
            $tipSubtotal = $_POST["subtotal"];
            $actualSubtotal = Validator::noDiscount() ? $_POST["subtotal"] : $_POST["discountedSubtotal"];
            
            $display["tip"] = $tipSubtotal * $tipPercentage / 100;
            $display["total"] = $actualSubtotal + $display["tip"];
            $split = $_POST["split"];
            
            if($split > 1)
            {
                $display["splitTip"] = $display["tip"] / $split;
                $display["splitTotal"] = $splitTotal = $display["total"] / $split;
            }
            
            return $display;
        }
        else
        {
            return NULL;
        }
    }
}

?>