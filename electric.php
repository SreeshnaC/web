<html>
<head>
<title>Electricity Bill Calculator</title>
</head>
<body>
<h2>Electricity Bill Calculator</h2>
<form action="electric.php" method="POST">
Enter Units Consumed:<br>
<input type="number" name="units" id="units" required><br><br>
<input type="submit" name="submit" value="Calculate Bill">
</form>
</body>
</html>



<?php
$rate1 = 0.5;  
$rate2 = 0.75;  
$rate3 = 1.0;
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $units = $_POST['units'];
    if ($units < 0) 
    {
        $error = "Please enter a valid number of units (greater than 0).";
    } 
    else 
    {
        $bill = 0;
        if ($units <= 100)
        {
           $bill = $units * $rate1;
        } 
        elseif ($units <= 200) 
        {
            $bill = 100 * $rate1 + ($units - 100) * $rate2;
        }
         else 
        {
            $bill = 100 * $rate1 + 100 * $rate2 + ($units - 200) * $rate3;
        }
        echo "<h3>Electricity Bill</h3>";
        echo "Units Consumed: $units <br>";
        echo "Total Bill: $" . number_format($bill, 2);
    }
}
else 
{
    echo "<h3>Please submit the form to calculate the bill.</h3>";
}
if ($error != "") {
    echo "<p style='color:red;'>$error</p>";
}
?>

