<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="/authlouis/signupProcess" method="post">
        <label>Username:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="/authlouis/login">Login</a></p>
</body>
</html>
