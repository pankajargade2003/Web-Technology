import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.*;
import java.sql.*;

@WebServlet("/myshop")
public class DemoServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Books List</title>");
        out.println("<style>");
        out.println("body { font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px; }");
        out.println("h2 { color: #333; }");
        out.println("table { border-collapse: collapse; width: 80%; margin: auto; }");
        out.println("th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }");
        out.println("th { background-color: #333; color: white; }");
        out.println("tr:nth-child(even) { background-color: #f2f2f2; }");
        out.println(".btn { margin: 20px auto; display: block; padding: 10px 20px; background-color: #333; color: white; border: none; cursor: pointer; }");
        out.println(".popup-form { display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 30px; border: 2px solid #ccc; z-index: 999; box-shadow: 0 0 10px rgba(0,0,0,0.3); }");
        out.println(".popup-form input, .popup-form button { display: block; margin: 10px 0; padding: 8px; width: 100%; }");
        out.println(".overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 998; }");
        out.println("</style>");

        out.println("<script>");
        out.println("function showForm() { document.getElementById('formPopup').style.display = 'block'; document.getElementById('overlay').style.display = 'block'; }");
        out.println("function showDeleteForm() { document.getElementById('deleteFormPopup').style.display = 'block'; document.getElementById('overlay').style.display = 'block'; }");
        out.println("function showUpdateForm() { document.getElementById('updateFormPopup').style.display = 'block'; document.getElementById('overlay').style.display = 'block'; }");

        out.println("function hideForm() {");
        out.println("  document.getElementById('formPopup').style.display = 'none';");
        out.println("  document.getElementById('deleteFormPopup').style.display = 'none';");
        out.println("  document.getElementById('updateFormPopup').style.display = 'none';");
        out.println("  document.getElementById('overlay').style.display = 'none';");
        out.println("}");
        out.println("</script>");

        out.println("</head><body>");

        out.println("<h2 align='center'>List of Books</h2>");
        out.println("<div style='display: inline-flex; align-item=center; justify-content: center'>");

        out.println("<button class='btn' onclick='showForm()'>Add Book</button>");
        out.println("<div id='overlay' class='overlay' onclick='hideForm()'></div>");

        out.println("<div id='formPopup' class='popup-form'>");
        out.println("<form method='post' action='myshop'>");
        out.println("<h3>Add New Book</h3>");
        out.println("<input type='text' name='title' placeholder='Book Title' required>");
        out.println("<input type='text' name='author' placeholder='Book Author' required>");
        out.println("<input type='number' step='0.01' name='price' placeholder='Book Price' required>");
        out.println("<input type='number' name='quantity' placeholder='Quantity' required>");
        out.println("<button type='submit'>Submit</button>");
        out.println("<button type='button' onclick='hideForm()'>Cancel</button>");
        out.println("</form></div>");

        out.println("<button class='btn' onclick='showDeleteForm()'>Delete Book</button>");
        out.println("<div id='deleteFormPopup' class='popup-form'>");
        out.println("<form method='post' action='myshop'>");
        out.println("<h3>Delete Book</h3>");
        out.println("<input type='hidden' name='action' value='delete'>");
        out.println("<input type='text' name='titleToDelete' placeholder='Book Title to Delete' required>");
        out.println("<button type='submit'>Delete</button>");
        out.println("<button type='button' onclick='hideForm()'>Cancel</button>");
        out.println("</form></div>");

        out.println("<button class='btn' onclick='showUpdateForm()'>Update Book</button>");
        out.println("<div id='updateFormPopup' class='popup-form'>");
        out.println("<form method='post' action='myshop'>");
        out.println("<h3>Update Book</h3>");
        out.println("<input type='hidden' name='action' value='update'>");
        out.println("<input type='text' name='titleToUpdate' placeholder='Book Title' required>");
        out.println("<input type='text' name='updatedPrice' placeholder='New Price (Optional)'>");
        out.println("<input type='text' name='updatedQuantity' placeholder='New Quantity (Optional)'>");
        out.println("<button type='submit'>Update</button>");
        out.println("<button type='button' onclick='hideForm()'>Cancel</button>");
        out.println("</form></div>");
        out.println("</div><br>");

        String url = "jdbc:mysql://localhost:3306/pragati";
        String user = "root";
        String password = "";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(url, user, password);

            Statement stmt = conn.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM ebookshop");

            out.println("<table>");
            out.println("<tr><th>Book ID</th><th>Title</th><th>Author</th><th>Price</th><th>Quantity</th></tr>");

            while (rs.next()) {
                int id = rs.getInt("book_id");
                String title = rs.getString("book_title");
                String author = rs.getString("book_author");
                double price = rs.getDouble("book_price");
                int qty = rs.getInt("quantity");

                out.println("<tr>");
                out.println("<td>" + id + "</td>");
                out.println("<td>" + title + "</td>");
                out.println("<td>" + author + "</td>");
                out.println("<td>$" + price + "</td>");
                out.println("<td>" + qty + "</td>");
                out.println("</tr>");
            }

            out.println("</table>");
            rs.close();
            stmt.close();
            conn.close();

        } catch (Exception e) {
            out.println("<p style='color:red;'>Error: " + e.getMessage() + "</p>");
        }

        out.println("</body></html>");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String action = request.getParameter("action");

        String url = "jdbc:mysql://localhost:3306/pragati";
        String user = "root";
        String password = "";

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(url, user, password);

            if ("delete".equals(action)) {
                String titleToDelete = request.getParameter("titleToDelete");
                String sql = "DELETE FROM ebookshop WHERE book_title = ?";
                PreparedStatement pstmt = conn.prepareStatement(sql);
                pstmt.setString(1, titleToDelete);
                pstmt.executeUpdate();
                pstmt.close();

            } else if ("update".equals(action)) {
                String titleToUpdate = request.getParameter("titleToUpdate");
                String updatedPrice = request.getParameter("updatedPrice");
                String updatedQuantity = request.getParameter("updatedQuantity");

                StringBuilder sql = new StringBuilder("UPDATE ebookshop SET ");
                boolean hasPrice = updatedPrice != null && !updatedPrice.isEmpty();
                boolean hasQty = updatedQuantity != null && !updatedQuantity.isEmpty();

                if (!hasPrice && !hasQty) {
                    response.sendRedirect("myshop");
                    return;
                }

                if (hasPrice) sql.append("book_price = ?");
                if (hasPrice && hasQty) sql.append(", ");
                if (hasQty) sql.append("quantity = ?");
                sql.append(" WHERE book_title = ?");

                PreparedStatement pstmt = conn.prepareStatement(sql.toString());
                int i = 1;

                if (hasPrice) pstmt.setDouble(i++, Double.parseDouble(updatedPrice));
                if (hasQty) pstmt.setInt(i++, Integer.parseInt(updatedQuantity));
                pstmt.setString(i, titleToUpdate);
                pstmt.executeUpdate();
                pstmt.close();

            } else {
                String title = request.getParameter("title");
                String author = request.getParameter("author");
                String price = request.getParameter("price");
                String quantity = request.getParameter("quantity");

                String sql = "INSERT INTO ebookshop(book_title, book_author, book_price, quantity) VALUES (?, ?, ?, ?)";
                PreparedStatement pstmt = conn.prepareStatement(sql);
                pstmt.setString(1, title);
                pstmt.setString(2, author);
                pstmt.setDouble(3, Double.parseDouble(price));
                pstmt.setInt(4, Integer.parseInt(quantity));
                pstmt.executeUpdate();
                pstmt.close();
            }

            conn.close();
        } catch (Exception e) {
            e.printStackTrace();
        }

        response.sendRedirect("myshop");
    }
}