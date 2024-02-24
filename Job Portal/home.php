<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="Images/logo.jpg">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <div id="comp">
        <img src="Images/logo-1.png" id="clogo">
        <h3>JobHelpr</h3>
    </div>
    <nav>
        <ol>
            <li>Home</li>
            <li>About Us</li>
            <li>Popular Jobs</li>
            <li>Companies</li>
        </ol>
    </nav>
    <div id="ori">
        <p id="quote">Find Your Perfect Job Match</p>
        <img src="Images/man.png" id="iman">
        <div id="search">
            <form action="home.php" method="post" id="sform">
                <input type="text" placeholder="Enter job role" id="job" name="fjob">
                <input type="submit" value="Find Jobs" id="sbtn">
            </form>
        </div>
        <p id="pop">Popular Searches: Designer, Developer, Web, IOS, Python</p>
    </div>
    <div id="ajobs">
        <ul id="jlist">
        </ul>
        <button id="bbtn">Back</button>
    </div>
    <script>
        function shjobs(){
            // event.preventDefault();
            const div1 = document.getElementById("ori");
            const div2 = document.getElementById("ajobs");
            const back = document.getElementById("bbtn");
            document.getElementById("sform").reset();
            

            div1.style.display = "none";
            div2.style.display = "block";

            back.addEventListener("click",function(){
                div1.style.display = "block";
                div2.style.display = "none";
            });
        }
        function addjobs(r,c){
            const jlist = document.getElementById("jlist");
            const list = document.createElement("li");
            const h1 = document.createElement("h2");
            h1.textContent = r;
            h1.style.color = "#17144D";
            const p = document.createElement("h4");
            p.textContent = c;
            p.style.color = "white";
            list.appendChild(h1);
            list.appendChild(p);
            jlist.appendChild(list);
        }
    </script>
</body>
</html>
<?php
    $conn = mysqli_connect("localhost", "root","","jobportal");
    if(!$conn){
        die("Connection failed with DB".mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $post = $_POST["fjob"];
        $query = "SELECT * FROM jobs WHERE role = '$post'";
        $result = mysqli_query($conn,$query);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $r = $row["role"];
                $c = $row["company"];
                echo '<script type = "text/javascript">';
                echo 'var r1 = "'.$r.'";';
                echo 'var c1 = "'.$c.'";';
                echo 'addjobs(r1,c1)';
                echo "</script>";
            }
            echo '<script type = "text/javascript">shjobs()</script>';
        }
    }
?>