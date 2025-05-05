<%-- display.jsp --%>
<%@ include file="db.jsp" %>
<%@ page errorPage="error.jsp" %>
<html>
<head><title>Book List</title></head>
<body>
<h2>Available Books</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>

<%
    try {
        Statement stmt = conn.createStatement();
        ResultSet rs = stmt.executeQuery("SELECT * FROM ebookshop");

        while (rs.next()) {
%>
    <tr>
        <td><%= rs.getInt("book_id") %></td>
        <td><%= rs.getString("book_title") %></td>
        <td><%= rs.getString("book_author") %></td>
        <td><%= rs.getDouble("book_price") %></td>
        <td><%= rs.getInt("quantity") %></td>
        <td>
            <a href="update.jsp?id=<%= rs.getInt("book_id") %>">Update</a> |
            <a href="delete.jsp?id=<%= rs.getInt("book_id") %>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
    </tr>
<%
        }
    } catch (Exception e) {
        out.println("Error displaying books: " + e.getMessage());
    }
%>

</table>

<br><a href="insert.jsp">Add New Book</a>

</body>
</html>