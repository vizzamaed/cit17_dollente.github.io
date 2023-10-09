<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //PHP Syntax Overview
    $age = 2023 - 2000;
    $greetings= "Hello!, ";
    $name= "Viz";
    print("$greetings $name<br>");
    print("You are $age years old.<br>");

    if ($age > 17)
    {
    print("You passed the minimum age requirement!<br>");
    }
    else
    {
    print("Sorry, your age is not allowed<br>");
    }
    
    function multiply($int_price){
        $int_price= $int_price * 100;
        return $int_price;
    }

    $retval= multiply(3.142344);
    print "Your total price of purchase : Php $retval <br>";

    $round_off_price = $retval;
    function addit() {
    GLOBAL $round_off_price;
    $round_off_price++;
    print "Official payment is $round_off_price<br>";
    }
    addit();

    $paid=false;

    if($paid===true){
        print("Thank you!<br>");}
    else{
        print("Please pay! <br>");
        }
        
    $num = 5;
    function assignx () 
        {
        $num = 10;
        print "$num is local variable, inside of function.<br>";
        }
        assignx();
        print "$num is global variable, outside of function.<br>";    
    

        function keep_track() {
         STATIC $count = 3;
         $count++;
         print $count;
         print "";
        }
        keep_track();
        keep_track();
        keep_track();

    ?>
</body>

</html>