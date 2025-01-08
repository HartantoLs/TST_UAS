<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= esc(session()->get('username')) ?>!</h1>
    <p>You are logged in.</p>

    <a href="<?= base_url('booksPage') ?>">Go to Books</a>
    <br>
    <a href="<?= base_url('pembahasanSoal') ?>">Go to Pembahasan Soal</a>
    <br>
    <a href="<?= base_url('authLouis/logout') ?>">Logout</a>
</body>
</html>
