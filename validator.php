<?php

class Validator
{
    public static function formSubmitted()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    public static function useCustomTipPercentage()
    {
         return isset($_POST["tipPercentage"]) && $_POST["tipPercentage"] == "custom";
    }
    
    public static function validSubtotal()
    {
        return isset($_POST["subtotal"]) && is_numeric($_POST["subtotal"]) && ($_POST["subtotal"] > 0);
    }
    
    public static function validCustomTipPercentage()
    {
        return isset($_POST["customTipPercentage"]) && is_numeric($_POST["customTipPercentage"]) && ($_POST["customTipPercentage"] > 0);
    }
    
    public static function validTipPercentage()
    {
        return isset($_POST["tipPercentage"]) && (is_numeric($_POST["tipPercentage"]) || Validator::validCustomTipPercentage());
    }
    
    public static function validSplit()
    {
        return isset($_POST["split"]) && filter_var($_POST["split"], FILTER_VALIDATE_INT) && ($_POST["split"] > 0);
    }    
    
    public static function getErrorMessage()
    {
        $formSubmitted = Validator::formSubmitted();
        $validSubtotal = Validator::validSubtotal();
        $validTipPercentage = Validator::validTipPercentage();
        $validSplit = Validator::validSplit();

        if(!$formSubmitted)
        {
            return "";
        }
        else if(!$validSubtotal || !$validTipPercentage || !$validSplit)
        {
            $issues = array();
            $i = 0;
            
            if(!$validSubtotal)
            {
                $issues[$i++] = "subtotal";
            }
            if(!$validTipPercentage)
            {
                $issues[$i++] = "tip percentage";
            }
            if(!$validSplit)
            {
                $issues[$i++] = "split";
            }
            
            if(count($issues) == 3)
            {
                return "Please specify a valid {$issues[0]}, {$issues[1]}, and {$issues[2]}.";
            }
            else if(count($issues) == 2)
            {
                return "Please specify a valid {$issues[0]} and {$issues[1]}.";
            }
            else
            {
                return "Please specify a valid {$issues[0]}.";
            }
        }
        else
        {
            return false;
        }
    }

    public static function validInputs()
    {
        return (Validator::getErrorMessage() === false);
    }
}

?>