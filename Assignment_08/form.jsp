<html>
<head><title>Insert Book</title></head>
<body>
<h2>Insert New Book</h2>
<form method="post" action="insert.jsp">
    <input type="hidden" name="submitType" value="Insert">
    Book ID: <input type="number" name="book_id" required><br><br>
    Title: <input type="text" name="book_title" required><br><br>
    Author: <input type="text" name="book_author" required><br><br>
    Price: <input type="number" step="0.01" name="book_price" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    <input type="submit" value="Add Book">
</form>
</body>
</html>
