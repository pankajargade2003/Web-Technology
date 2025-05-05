<%-- error.jsp --%>
<%@ page isErrorPage="true" %>
<html>
<head>
    <title>Error Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error-container {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        h2 {
            color: #721c24;
        }
        .back-link {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h2>Error Occurred</h2>
        <p>An error occurred while processing your request.</p>
        <p>Error Type: <%= exception != null ? exception.getClass().getName() : "Unknown" %></p>
        <p>Error Message: <%= exception != null ? exception.getMessage() : "No specific message" %></p>
    </div>
    
    <div class="back-link">
        <a href="insert.jsp">Return to Book Management</a>
    </div>
</body>
</html>