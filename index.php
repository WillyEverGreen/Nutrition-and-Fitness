<?php

$con=mysqli_connect("localhost","root","","oep")or die(mysqli_error());
$cnt=0;
$emailerr ="";
$nerr="";
$perr="";
	if(isset($_REQUEST['s1']))
	{
		$uname = $_POST['username'];
		$pass = $_POST['password'];
		
		 
		$sqlone = "select * from login where username='$uname' and password='$pass'";
		$resultt = mysqli_query($con,$sqlone);
		
		if(mysqli_fetch_array($resultt)>0)
		{
			header("location:login.html");
		}
	}

	if(isset($_REQUEST['s2']))
	{
		$username = $_POST['newuser'];
		$password = $_POST['newpassword'];
		$emailid = $_POST['emailid'];
		 
		$sql = "INSERT INTO login values ('$username','$password','$emailid',0)";
		$result = mysqli_query($con,$sql);
		if($result>0)
		{
			header("location:index.php");
		}
	}
	

?>

<html>
    <head><title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <div class="social-icons">
                    <img src="images/fb.png">
                    <img src="images/twitter.png">
                    <img src="images/google.png">
                </div>
                <form  method="post" id="login" class="input-group" >
                    <input type="text" class="input-field" name="username" placeholder="Enter Username" required>
                    <input type="text" class="input-field" name="password" placeholder="Enter Password" required>
                    <input type="checkbox" class="checkbox"><span>Remember Password</span>
                    <button name="s1" type="submit" class="submit-btn">Log In</button>
                </form>
                <form method="post" id="register" class="input-group">
                    <input type="text" name="newuser"class="input-field" placeholder="Enter Username" required>
                    <input type="email" name="emailid" class="input-field" placeholder="Email id" required>
                    <input type="text" name="newpassword" class="input-field" placeholder="Enter Password" required>
                    <input type="checkbox" class="checkbox"><span>I agree to the terms & conditions</span>
                    <button name="s2" type="submit" class="submit-btn">Register</button>
                </form>
                
            </div>
            
        </div>
        <script>
            var x=document.getElementById("login");
            var y=document.getElementById("register");
            var z=document.getElementById("btn");
            function register()
            {
                x.style.left="-400px";
                y.style.left="50px";
                z.style.left="110px";

            }
            function login()
            {
                x.style.left="50px";
                y.style.left="450px";
                z.style.left="0px";

            }
        </script>
    </body>
</html>
