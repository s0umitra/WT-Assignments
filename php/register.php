<?php
require_once 'database.php';

$username=$password=$firstname=$lastname=$gender=$mailid=$mobile=$classs=$department=$age=$address=$sub="";

if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $gender = trim($_POST['gender']);
    $mailid = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $classs = trim($_POST['clas']);
    $department = trim($_POST['departement']);
    $age = trim($_POST['age']);
    $address = trim($_POST['address']);
    $sub = $_POST['subject'];
    $subs = implode(',',$sub);


    $sql = "INSERT INTO users(username,password,firstname,lastname,gender,email,mobile,class,departement,age,address,subject)values('$username','$password','$firstname','$lastname','$gender','$mailid','$mobile','$classs','$department','$age','$address','$subs')";

    echo $sql;
    $query = mysqli_query($conn,$sql);
    echo $query;

    if($query){
        echo "<script>alert('Your are registered successfully!!');location.replace('login.php')</script>";
    }
    else{
        echo "<script>alert('Sorry!! Error!!')</script>";
    }
}
else{

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Library REGISTRATION FORM</title>
        <link rel="stylesheet" type="text/css" href="reg.css">
    </head>
<body>

<form action=""  method="POST" autocomplete="on">
    <div class="log">
        <h2>Library REGISTRATION FORM</h2>
    </div>
    <div class="main">
        Username<br>
        <input type="text" placeholder="Enter Username" name="username" required>
        <br>

        Password<br>
        <input type="password" placeholder="Enter Password" name="password" autocomplete="off" required>
        <br>

        Firstname<br>
        <input type="text" placeholder="Enter Firstname" name="firstname" required>
        <br>

        Lastname<br>
        <input type="text" placeholder="Enter Lastname" name="lastname" required>
        <br>
        <div class="col20">
            Gender<br>
        </div>
        <div class="col80">
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
        </div>
        <br>
        <br>
        <br>
        <br>
        Email<br>
        <input type="email" placeholder="Enter you mail" name="email"  autocomplete="off"required>
        <br>

        Mobile<br>
        <input type="number" placeholder="Enter mobile" name="mobile" autocomplete="off" required>
        <br>

        Class<br>
        <select name="clas">

            <option value="FE">FE</option>
            <option value="SE">SE</option>
            <option value="TE">TE</option>
            <option value="BE">BE</option>
        </select>
        <br>

        Department<br>
        <select name="departement">

            <option value="Computer">Computer</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Information Technology">Information Technology</option>
            <option value="ENTC">ENTC</option>
        </select>
        <br>

        Age<br>
        <input type="number" placeholder="Enter Age" name="age" autocomplete="off" required>
        <br>

        Address<br>
        <textarea rows="4" cols="50" name="address">

        </textarea>
        <br>
        <div class="col20">
            Subjects<br>
        </div>
        <div class="col80">
            <input type="checkbox" name="subject[]" value="OOP">OOP<br>
            <input type="checkbox" name="subject[]" value="DAA">DAA<br>
            <input type="checkbox" name="subject[]" value="PPL" checked>PPL<br>
            <input type="checkbox" name="subject[]" value="MP">MP<br>
        </div>
        <br><br>

        <input type="submit"  name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
        <br>
        <p>Do you want to Login instead?</p>
        <a href="login.php">LOGIN?</a>
    </div>

</form>
</body>
</html>
