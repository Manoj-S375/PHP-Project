<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="icon" href="Images/logo.jpg">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div id="comp">
        <img src="Images/logo-1.png" id="clogo">
        <h1>JobHelpr</h1>
    </div>
    <div id="login">
        <h1>Sign In</h1>
        <form action="login.php" method="post" autocomplete="off">
            <input type="hidden" name="ftype" value="login">
            <label id="l1">Username:</label><br>
            <input type="text" id="fname" name="uname"><br>
            <label id="l2">Password:</label><br>
            <input type="password" id="fpass" name="pass"><br>
            <input type="submit" value=" Enter " id="btn">
        </form>
        <p>Or</p>
        <p id="p2">Find your jobs with us</p>
    </div>
    <div id="signup">
        <h1>Sign Up</h1>
        <form action="login.php" method="post" autocomplete="off">
            <input type="hidden" name="ftype" value="signin">
            <label id="l1">Username:</label><br>
            <input type="text" id="fname" name="uname1"><br>
            <label id="l2">Password:</label><br>
            <input type="password" id="fpass" name="pass1"><br>
            <label id="l3">Confirm Password:</label><br>
            <input type="password" id="fpass2" name="pass2"><br>
            <input type="submit" value="Continue" id="btn1">
        </form>
    </div>
    <script>
        const lg = document.getElementById("login");
        const sup = document.getElementById("signup");
        const btn = document.getElementById("p2");

        btn.addEventListener("click", function(){
            lg.style.display = "none";
            sup.style.display = "block";
        });
    </script>
</body>
</html>
<?php
        $conn = mysqli_connect("localhost", "root","","jobportal");
        if(!$conn){
            die("Connection failed with DB".mysqli_connect_error());
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["ftype"] == "login"){
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $query = "SELECT * FROM login WHERE Username = '$uname' AND Password = '$pass'";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) == 1){
                    if ($uname == "admin"){
                        header("Location:add.php");
                    }
                    else{
                        header("Location:home.php");
                    }
                }else{
                    echo "<p style='color:red;position:absolute;left:14vw;top:31vw'>Invalid Username or Password</p>";
                }
            }
            elseif($_POST["ftype"] == "signin"){
                $uname = $_POST["uname1"];
                $pass1 = $_POST["pass1"];
                $pass2 = $_POST["pass2"];
                if ($pass1 != $pass2)
                {
                    echo "<p style='color:red;position:absolute;left:14vw;top:31vw'>Passwords doesn't match</p>";        
                }
                else{
                    $query = "INSERT INTO login(Username,Password) VALUES ('$uname','$pass1')";
                    mysqli_query($conn,$query); 
                    header("Location:home.php");
                }
            }
        }
        mysqli_close($conn);
        exit();
?>