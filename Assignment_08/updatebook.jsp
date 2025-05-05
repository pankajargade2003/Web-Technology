<%-- updatebook.jsp --%>
<%@ include file="db.jsp" %>
<%@ page errorPage="error.jsp" %>

<%
    String id = request.getParameter("book_id");
    String title = request.getParameter("book_title");
    String author = request.getParameter("book_author");
    String price = request.getParameter("book_price");
    String quantity = request.getParameter("quantity");

    if (id != null && title != null && author != null && price != null && quantity != null) {
        try {
            PreparedStatement ps = conn.prepareStatement(
                "UPDATE ebookshop SET book_title=?, book_author=?, book_price=?, quantity=? WHERE book_id=?"
            );
            ps.setString(1, title);
            ps.setString(2, author);
            ps.setDouble(3, Double.parseDouble(price));
            ps.setInt(4, Integer.parseInt(quantity));
            ps.setInt(5, Integer.parseInt(id));
            ps.executeUpdate();
            
            // Use JavaScript for redirection instead of Cookie attributes
            out.println("<script>alert('Book updated successfully!');window.location='display.jsp';</script>");
        } catch (Exception e) {
            throw new ServletException("Error updating book: " + e.getMessage());
        }
    } else {
        out.println("Missing data!");
    }
%>