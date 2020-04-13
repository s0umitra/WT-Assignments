<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@ page import = "javax.servlet.http.*,javax.servlet.*,java.io.*,java.sql.*,java.util.*" %>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Login Action</title>
</head>
<body>
<% 
PrintWriter pout = response.getWriter();
String uname = request.getParameter("username");
String pass = request.getParameter("password");

if (uname.equals("") || pass.equals("")) {
	out.println("<p>Please Enter username and password</p>");
}
try {
	Class.forName("com.mysql.jdbc.Driver");
	Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","root");  
	Statement stmt=con.createStatement();
	ResultSet rs=stmt.executeQuery("select password from users where username=\""+uname+"\"");
	if(rs.next()) {
		String psw = rs.getString(1);
		if (psw.equals(pass)) {
			RequestDispatcher rd = request.getRequestDispatcher("Welcome.jsp");
		    rd.forward(request, response);
		}
		else{
			pout.println("Username or password is wrong!!");
			RequestDispatcher rd = request.getRequestDispatcher("Login.jsp");
			rd.include(request, response);
		}
	}
	else {
		out.println("<p>Login failed!<br>Invalid Credentials!</p>");
	}
	
	
} catch (SQLException e) {
	e.printStackTrace();
} 	
%>
</body>
</html>