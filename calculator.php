<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<input type="number" name="num1" placeholder="Number one">
<select name="operator">
    <option value="add">+</option>
    <option value="subtract">-</option>
    <option value="multiply">*</option>
    <option value="divide">/</option>
</select>

<input type="number" name="num2" placeholder="Number two">
<button type="submit">Calculate</button>

</form> 

<?php 
if($_SERVER["REQUEST_METHOD"]  == "POST"){

    // grab data from inputs

$num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
$num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
$operator = htmlspecialchars($_POST["operator"]);

// error handlers
$errors = false; 

if(empty($num1)  || empty($num2)   || empty($operator)){
    echo "fill in all fields";
    $errors = true;
}
if(!is_numeric($num1)|| !is_numeric($num2)){
    echo "only numbers are allowed";
    $errors = true;
}

// if no errors founded then calculate the numbers
if(!$errors) {
    $value = 0;
    
    switch ($operator){
        case "add";
        $value = $num1 + $num2;
        break;

        case "subtract";
        $value = $num1 - $num2;
        break;

        case "multiply";
        $value = $num1 * $num2;
        break;

        case "divide";
        $value = $num1 / $num2;
        break;

        default: 
        echo "something went wrong";
    }

    echo "<p>Result = $value</p>";
}

}
?>

</body>
</html>

