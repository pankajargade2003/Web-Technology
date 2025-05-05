<%-- delete.jsp --%>
<%@ include file="db.jsp" %>
<%@ page errorPage="error.jsp" %>

<%
    String id = request.getParameter("id");

    if (id != null) {
        try {
            PreparedStatement ps = conn.prepareStatement("DELETE FROM ebookshop WHERE book_id = ?");
            ps.setInt(1, Integer.parseInt(id));
            int rows = ps.executeUpdate();
            if (rows > 0) {
                // Use JavaScript for redirection instead of Cookie attributes
                out.println("<script>alert('Book deleted successfully!');window.location='display.jsp';</script>");
            } else {
                out.println("<script>alert('Book not found!');window.location='display.jsp';</script>");
            }
        } catch (Exception e) {
            throw new ServletException("Error deleting book: " + e.getMessage());
        }
    } else {
        response.sendRedirect("display.jsp");
    }
%>