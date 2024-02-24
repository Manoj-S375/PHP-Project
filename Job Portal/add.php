<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Jobs</title>
    <link rel="icon" href="Images/logo.jpg">
    <link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>
    <div id="comp">
        <img src="Images/logo-1.png" id="clogo">
        <h1>JobHelpr</h1>
    </div>
    <div id="login">
        <h1>Add Jobs</h1>
        <form action="add.php" method="post" autocomplete="off">
            <label id="l1">Job Role:</label><br>
            <input type="text" id="fname" name="roles"><br>
            <label id="l2">Company Name:</label><br>
            <input type="text" id="fpass" name="comp"><br>
            <input type="submit" value=" Enter " id="btn">
        </form>
    </div>
</body>
</html>
<?php
    $conn = mysqli_connect("localhost", "root","","jobportal");
    if(!$conn){
        die("Connection failed with DB".mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $r = $_POST["roles"];
        $c = $_POST["comp"];
        $query = "INSERT INTO jobs(role, company) VALUES ('$r','$c')";
        mysqli_query($conn,$query);
        echo "<p style='color:white;position:absolute;left:12vw;top:43vw; font-size:2vw'>Job added successfully</p>";
    }
    mysqli_close($conn);
    exit();
?>