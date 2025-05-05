<%-- db.jsp --%>
<%@ page import="java.sql.*" %>
<%@ page errorPage="error.jsp" %>
<%
    String url = "jdbc:mysql://localhost:3306/pragati";
    String username = "root";
    String password = "";

    Connection conn = null;
    try {
        Class.forName("com.mysql.cj.jdbc.Driver");
        conn = DriverManager.getConnection(url, username, password);
    } catch (Exception e) {
        throw new ServletException("Database connection error: " + e.getMessage());
    }
%>