<?php
//Simple expression calculator by Andrei Filimon
//Sources : http://www.rexegg.com/regex-php.html ; php.net manual -preg_match function; create_function/
 
//Use any expression in any order 

$expression = $_POST['expression'];
//echo $expression;
//int strlen (string $expression);

$Temp = new CalculatorObj();
$result = $Temp->calculator($expression); 
//const pattern = '/(?:\-?[0-9]+(?:\.?[0-9]+)?[\+\-\*\/])+\-?[0-9]+(?:\.?[0-9]+)?/';

class CalculatorObj {

    public function calculator($textbox)
    {
            //  Preg_match function to match the patern and express the result
            if(preg_match('/(?:\-?[0-9]+(?:\.?[0-9]+)?[\+\-\*\/])+\-?[0-9]+(?:\.?[0-9]+)?/', $textbox, $matchpattern)){
                return $this->faddition($matchpattern[0]);
            }
            return 0;
        
        return $textbox;
    }
    //final result sent 
    private function faddition($textbox){
        $n = create_function(' ', 'return '.$textbox.';');
        return $n();
    }
}
?>

<form method="post" action = "Calculator.php">
The result for <?php  echo $expression ?> expression is:   <?php echo $result ?> <br/>
Enter the expression in any order: <input type = "text" name="expression" >
<input type="submit" name="submit" value = "Submit">
</form>

