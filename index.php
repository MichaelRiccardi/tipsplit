<?php

require "validator.php";
require "calculator.php";
require "output.php";

?>

<html>    
    <head>
        <title>tipsplit - PHP Tip Calculator</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9">
        
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <link rel="stylesheet" href="custom.css">
        
        <script src="script.js"></script>
        
    </head>
    
    <body onload="updatePersonOrPeople(); updateDiscountFields()">
        <div class="container align-middle">
            <form method="post">
                <h1 class="text-center">tipsplit</h1><br>
                <h4><?php Output::errorMessage() ?></h4>

                <div class="form-group form-inline">
                    <label id="billSubtotalLabel" for="subtotal">Bill subtotal:</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control subtotal" name="subtotal" type="number" step="any" value="<?php Output::subtotal() ?>">
                    </div>
                </div>
                
                <div class="form-group form-inline">
                    <label for="subtotal">Any discounts?&nbsp;&nbsp;</label>
                    <div class="input-group">
                        <?php Output::discountRadioButtons(); ?>
                    </div>
                </div>
                
                <div id="discountedSubtotalDiv" class="form-group form-inline" style="display: none;">
                    <label for="subtotal">Discounted subtotal:</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control subtotal" name="discountedSubtotal" type="number" step="any" value="<?php Output::discountedSubtotal() ?>">
                    </div>
                </div> 

                <div class="form-group form-inline">
                    <label for="subtotal">Tip percentage: <br>
                    <div class="input-group">
                        <?php Output::tipPercentageRadioButtons([ 10, 15, 20 ], 15); ?>
                    </div>
                    <div class="input-group">
                        <label class='radio-inline'>
                            &nbsp;&nbsp;<input type='radio' name='tipPercentage' id='customTipRadioButton' value='custom'<?php Output::customTipChecked() ?>>Custom:
                        </label>
                    </div>
                    <div class="input-group">
                        <input type='number' class='form-control' name='customTipPercentage' id='customTipPercentage' onfocus="selectCustom()" value='<?php Output::customTipPercentage() ?>'>
                        <span class='input-group-addon'>%</span>
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="split">Split:</label>
                    <div class="input-group">
                        <input name="split" id="split" class='form-control' type="number" step="1" onchange="updatePersonOrPeople()" value="<?php Output::split() ?>">
                        <span id="personOrPeople" class="input-group-addon">person</span>
                    </div>
                </div><br>
                
                <div class="text-center"><input type="submit" class="btn" value="Submit"></div>
            </form>
        </div>

        <?php Output::tipAndTotal(); ?>

    </body>
</html>