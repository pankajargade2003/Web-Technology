<%-- update.jsp --%>
<%@ include file="db.jsp" %>
<%@ page errorPage="error.jsp" %>

<html>
<head><title>Update Book</title></head>
<body>
<h2>Update Book</h2>

<%
    String id = request.getParameter("id");
    String title = "", author = "";
    double price = 0.0;
    int quantity = 0;

    if (id != null) {
        try {
            PreparedStatement ps = conn.prepareStatement("SELECT * FROM ebookshop WHERE book_id = ?");
            ps.setInt(1, Integer.parseInt(id));
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                title = rs.getString("book_title");
                author = rs.getString("book_author");
                price = rs.getDouble("book_price");
                quantity = rs.getInt("quantity");
            }
        } catch (Exception e) {
            throw new ServletException("Error loading book: " + e.getMessage());
        }
    }
%>

<form action="updatebook.jsp" method="post">
    <input type="hidden" name="book_id" value="<%= id %>">
    Title: <input type="text" name="book_title" value="<%= title %>" required><br><br>
    Author: <input type="text" name="book_author" value="<%= author %>" required><br><br>
    Price: <input type="number" step="0.01" name="book_price" value="<%= price %>" required><br><br>
    Quantity: <input type="number" name="quantity" value="<%= quantity %>" required><br><br>
    <input type="submit" value="Update Book">
</form>

<br><a href="display.jsp">Back to Book List</a>

</body>
</html>