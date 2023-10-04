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
    print("You passed the minimum age requirement!");
    }
    else
    {
    print("Sorry, your age is not allowed");
    }
    ?>
</body>

</html>