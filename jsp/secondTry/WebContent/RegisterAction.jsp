<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@ page import = "javax.servlet.http.*,javax.servlet.*,java.io.*,java.sql.*,java.util.*" %>
<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Register Action</title>
</head>
	<body>
<% try {
	String[] subject = request.getParameterValues("subject");
	String sub="";
	if (subject != null ){
		sub = String.join(", ", subject);
	}
	Class.forName("com.mysql.jdbc.Driver");
   Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","root");  
   PreparedStatement st = con.prepareStatement("insert into users values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
   st.setString(3, request.getParameter("firstname"));
   st.setString(4, request.getParameter("lastname"));
   st.setString(1, request.getParameter("username"));
   st.setString(2, request.getParameter("password"));
   st.setString(5, request.getParameter("gender")); 
   st.setString(6, request.getParameter("email")); 
   st.setString(8, request.getParameter("clas"));
   st.setString(7, request.getParameter("mobile"));
   st.setString(9, request.getParameter("department"));
   st.setString(10, request.getParameter("age"));
   st.setString(11, request.getParameter("address"));
	st.setString(12, sub);
    
   st.execute();
   st.close(); 
   con.close();
   out.println("<p>Registration Successful!</p>");
   out.println("<a href=\"/secondTry/Login\">Login Now</a>");
   
} catch (SQLException e) {
	// TODO Auto-generated catch block
	e.printStackTrace();
} %>
	</body>
</html>