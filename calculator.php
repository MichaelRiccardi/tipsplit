<?php

class Calculator
{
    public static function tipAndTotal()
    {
        if(Validator::validInputs())
        {    
            $tipPercentage = Validator::useCustomTipPercentage() ? $_POST["customTipPercentage"] : $_POST["tipPercentage"];
            
            $display["tip"] = $_POST["subtotal"] * $tipPercentage / 100;
            $display["total"] = $_POST["subtotal"] + $display["tip"];
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