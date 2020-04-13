<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="lb">
    <div id="a">
        <h2 align="center"><b>REGISTRATION FORM</b></h2>
    </div>
    <br>
    <form action="/secondTry/RegisterAction" method="post">
        <div class="row">    
                <div class="col-20"><label>Username:</label></div>
                <div class="col-80"><input type="Text" id="usnm" name="username" placeholder="Enter username" checked></div>
        </div>

        <div class="row">
            <div class="col-20"><label>Password:</label></div>
            <div class="col-80"><input type="Password" id="pswd" name="password" placeholder="Enter password"></div>
        </div>    

        <div class="row">
            <div class="col-20"><label>Firstname:</label></div>
            <div class="col-80"><input type="Text" id="fn" name="firstname" placeholder="Enter firstname"></div>
        </div>   

        <div class="row">
            <div class="col-20"><label>Lastname:</label></div>
            <div class="col-80"><input type="Text" name="lastname" id="ln" placeholder="Enter lastname"></div>
        </div>    
        <div class="row">
            <div class="col-20">
                <label>Gender:</label>
            </div>
            <div class="col-80">
                <input type="radio" name="gender" value="Male">
                <label>Male</label><br>
                <input type="radio" name="gender" value="Female">
                <label>Female</label>
            </div>
        </div>
        <div class="row">
                <div class="col-20"><label>Email:</label></div>
                <div class="col-80"><input type="Email" name="email" id="em" placeholder="Enter email id"></div>
        </div>
        <div class="row">
                <div class="col-20"><label>Mobile:</label></div>
                <div class="col-80"><input type="tel" name="mobile" id="mb" placeholder="Enter mobile number"></div>
            </div>   

            <div class="row">   
                <div class="col-20"><label>Class:</label></div>
                <div class="col-80"><select id="ide" name="clas">
                <option value="1">FE</option>
                <option value="2">SE</option>
                <option value="3">TE</option>
                <option value="4">BE</option>
                </select></div>
            </div>    

            <div class="row">     
                <div class="col-20"><label>Department:</label></div>
                <div class="col-80"><select name="department">
                <option>COMPUTER</option>
                <option>ELECTRICAL</option>
                <option>IT</option>
                <option>MECHANICAL</option>
                </select></div>
            </div>    

            <div class="row">    
                <div class="col-20"><label>Age:</label></div>
                <div class="col-80"><input type="number" name="age"></div>
            </div>   

            <div class="row">    
                <div class="col-20"><label>Address:</label></div>
                <div class="col-80"><textarea name="address" placeholder="Enter address"></textarea></div>
            </div>    

            <div class="row">
                <div class="col-20"><label>Subjects:</label></div>
                <div class="col-80">
                    <input type="checkbox" name="subject" value="OOP">
                    <label>OOP</label>
                    <br>
                    <input type="checkbox" name="subject"  value="DAA">
                    <label>DAA</label>
                    <br>
                    <input type="checkbox" name="subject" value="PPL">
                    <label>PPL</label>
                    <br>
                    <input type="checkbox" name="subject" value="MP">
                    <label>MP</label>
                </div>
            </div>
        <div class="rb">
			<input type="submit" value="Register">
        </div>
    </form>
</body>
</html>
