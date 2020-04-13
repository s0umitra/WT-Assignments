<?php
require_once 'database.php';
session_start();

$username=$password="";
if(isset($_POST['submit'])){
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
    $department=trim($_POST['department']);
    if(!$username=='' && !$password=='' && !empty($department))
	{
        $sql = "SELECT * FROM users where username='$username'and departement='$department' and password='$password'";
		$query=mysqli_query($conn,$sql);

		$count = mysqli_num_rows($query);
		if($count == 1){
			$_SESSION['username']=$username;
			header("location:welcome.php");
		}
		else{
			echo "<script>alert('Invalid Credentials')</script>";
		}
	}
	else{
		echo"<script>alert('All fields must be filled')</script>";
	}
}
?>

<html>
    <head>
        <title>Library Login Form</title>
        <meta charset="utf-8">
        <link href="log.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form action="" autocomplete="on" method="POST">
            <h1>Library Login Form</h1>

            <div class="container">
                Username :
                <input type="text" placeholder="Enter Username" name="username" required>
                <br>

                Password :
                <input type="password" placeholder="Enter Password" name="password" autocomplete="off" required>
                <br>
                <br>
                Department<br><br>
                <select name="department" id="department">
                    <option value="">Select Department</option>
                    <option value="Computer">Computer</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="ENTC">ENTC</option>
                </select>
                <br>
                <br>

                <input type="checkbox" name="pass" value="pass" checked>Save Password<br><br>

                <input type="submit" name="submit" value="Sign In">
                <input type="reset"  name="reset" value="Reset"><br><br>

                <a href="forgot.html">Forgot Password?</a>
                <br><br>
                Click here :
                <a href="register.php">To Register</a>
            </div>
        </form>
    </body>
</html>
