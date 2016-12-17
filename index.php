<?php

require "validator.php";
require "calculator.php";
require "output.php";

?>

<html>    
    <head>
        <title>tipsplit - PHP Tip Calculator</title>
        
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme ->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
        
        <link rel="stylesheet" href="custom.css?<?php echo rand(); ?>">

        <!-- Latest compiled and minified JavaScript ->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script-->
        
        <script src="script.js"></script>
        
    </head>
    
    <body onload="updatePersonOrPeople()">
        <div class="container align-middle">
            <form method="post">
                <h1 class="text-center">tipsplit</h1><br>
                <h4><?php Output::errorMessage() ?></h4>

                <div class="form-group form-inline">
                    <label for="subtotal">Bill subtotal:</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control" name="subtotal" type="number" step="any" value="<?php Output::subtotal() ?>">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="subtotal">Tip percentage:</label><br>
                    <div class="input-group">
                        <?php Output::radioButtons([ 10, 15, 20 ], 15); ?>
                    </div>
                    <div class="input-group">
                        <label class='radio-inline'>
                            &nbsp;&nbsp;<input type='radio' name='tipPercentage' id='customTipRadioButton' value='custom'<?php Output::customTipChecked() ?>>Custom:
                        </label>
                    </div>
                    <div class="input-group">
                        <input type='text' class='form-control' name='customTipPercentage' id='customTipPercentage' onfocus="selectCustom()" value='<?php Output::customTipPercentage() ?>'>
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