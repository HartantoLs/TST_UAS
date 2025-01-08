<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <form action="/authlouis/loginProcess" method="post">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="/authlouis/signup">Sign Up</a></p>
</body>
</html>
