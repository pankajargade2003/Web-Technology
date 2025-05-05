<%-- insert.jsp --%>
<%@ include file="db.jsp" %>
<%@ page import="java.sql.*" %>
<%@ page errorPage="error.jsp" %>

<html>
<head>
    <title>Book Management</title>
</head>
<body>

<h2>Book Management System</h2>

<!-- Menu Buttons -->
<form method="get" action="insert.jsp">
    <input type="submit" name="action" value="Insert Book">
    <input type="submit" name="action" value="Display Books">
    <input type="submit" name="action" value="Delete Book">
    <input type="submit" name="action" value="Update Book">
</form>
<hr>

<%
    String action = request.getParameter("action");
    if (action == null) action = "Insert Book"; // Default

    if (action.equals("Insert Book")) {
%>
    <!-- Insert Form -->
    <h3>Insert New Book</h3>
    <form method="post" action="insert.jsp">
        Book ID: <input type="number" name="book_id" required><br><br>
        Title: <input type="text" name="book_title" required><br><br>
        Author: <input type="text" name="book_author" required><br><br>
        Price: <input type="number" step="0.01" name="book_price" required><br><br>
        Quantity: <input type="number" name="quantity" required><br><br>
        <input type="hidden" name="submitType" value="Insert">
        <input type="submit" value="Save Book">
    </form>
<%
    } else if (action.equals("Display Books")) {
%>
    <!-- Display Books -->
    <h3>All Books</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Price</th><th>Quantity</th>
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
        </tr>
    <%
            }
        } catch (Exception e) {
            out.println("Error displaying books: " + e.getMessage());
        }
    %>
    </table>
<%
    } else if (action.equals("Delete Book")) {
%>
    <!-- Delete Form -->
    <h3>Delete Book</h3>
    <form method="post" action="insert.jsp">
        Enter Book ID to Delete: <input type="number" name="book_id" required><br><br>
        <input type="hidden" name="submitType" value="Delete">
        <input type="submit" value="Delete Book">
    </form>
<%
    } else if (action.equals("Update Book")) {
%>
    <!-- Update Form -->
    <h3>Update Book</h3>
    <form method="post" action="insert.jsp">
        Book ID to Update: <input type="number" name="book_id" required><br><br>
        New Title: <input type="text" name="book_title" required><br><br>
        New Author: <input type="text" name="book_author" required><br><br>
        New Price: <input type="number" step="0.01" name="book_price" required><br><br>
        New Quantity: <input type="number" name="quantity" required><br><br>
        <input type="hidden" name="submitType" value="Update">
        <input type="submit" value="Update Book">
    </form>
<%
    }
%>

<!-- Handling Insert / Delete / Update Operations -->
<%
    String submitType = request.getParameter("submitType");
    if (submitType != null) {
        String id = request.getParameter("book_id");
        if (submitType.equals("Insert")) {
            String title = request.getParameter("book_title");
            String author = request.getParameter("book_author");
            String price = request.getParameter("book_price");
            String quantity = request.getParameter("quantity");

            try {
                PreparedStatement ps = conn.prepareStatement(
                    "INSERT INTO ebookshop (book_id, book_title, book_author, book_price, quantity) VALUES (?, ?, ?, ?, ?)"
                );
                ps.setInt(1, Integer.parseInt(id));
                ps.setString(2, title);
                ps.setString(3, author);
                ps.setDouble(4, Double.parseDouble(price));
                ps.setInt(5, Integer.parseInt(quantity));
                ps.executeUpdate();
                out.println("<p>Book inserted successfully!</p>");
            } catch (Exception e) {
                out.println("<p style='color:red;'>Error inserting book: " + e.getMessage() + "</p>");
            }

        } else if (submitType.equals("Delete")) {
            try {
                PreparedStatement ps = conn.prepareStatement(
                    "DELETE FROM ebookshop WHERE book_id = ?"
                );
                ps.setInt(1, Integer.parseInt(id));
                int rows = ps.executeUpdate();
                if (rows > 0) {
                    out.println("<p>Book deleted successfully!</p>");
                } else {
                    out.println("<p style='color:red;'>Book ID not found!</p>");
                }
            } catch (Exception e) {
                out.println("<p style='color:red;'>Error deleting book: " + e.getMessage() + "</p>");
            }

        } else if (submitType.equals("Update")) {
            String title = request.getParameter("book_title");
            String author = request.getParameter("book_author");
            String price = request.getParameter("book_price");
            String quantity = request.getParameter("quantity");

            try {
                PreparedStatement ps = conn.prepareStatement(
                    "UPDATE ebookshop SET book_title=?, book_author=?, book_price=?, quantity=? WHERE book_id=?"
                );
                ps.setString(1, title);
                ps.setString(2, author);
                ps.setDouble(3, Double.parseDouble(price));
                ps.setInt(4, Integer.parseInt(quantity));
                ps.setInt(5, Integer.parseInt(id));
                int rows = ps.executeUpdate();
                if (rows > 0) {
                    out.println("<p>Book updated successfully!</p>");
                } else {
                    out.println("<p style='color:red;'>Book ID not found!</p>");
                }
            } catch (Exception e) {
                out.println("<p style='color:red;'>Error updating book: " + e.getMessage() + "</p>");
            }
        }
    }
%>

</body>
</html>