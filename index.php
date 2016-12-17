<?php

require "validator.php";
require "output.php";

?>

<html>    
    <head>
        <title>tipsplit - PHP Tip Calculator</title>
    </head>
    
    <body>
        <form method="post">
            <h1>tipsplit</h1>
            <h3><?php Output::errorMessage() ?></h3>

            <p>Bill subtotal:  $<input name="subtotal" type="number" step="any" value="<?php Output::subtotal() ?>"></p>

            <p>Tip percentage: <?php Output::radioButtons([ 10, 15, 20 ], 15); ?></p>
                
            <p>Split between: <input name="split" type="text" value="<?php Output::split() ?>"> person(s)</p>
            
            <p><input type="submit" value="Submit"></p>
            
            <p><?php Output::tipAndTotal(); ?></p>
                
        </form>
    </body>
</html>