<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    <div class="mb-3">
            <a href="/louisdashboard.php" class="btn btn-secondary btn-sm">&larr; Back to Dashboard</a>
    </div>
    <h1>Books List</h1>
    
    <?php if (session()->get('username')): ?>
        <p>Welcome, <?= session()->get('username'); ?>!</p>
        <a href="/authlouis/logout">Logout</a>
    <?php else: ?>
        <p><a href="/authlouis/login">Login</a> to leave reviews.</p>
    <?php endif; ?>

    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <h2><?= $book['title']; ?></h2>
                <p><strong>Author:</strong> <?= $book['author']; ?></p>
                <p>Average Rating: <?= isset($book['average_rating']) ? $book['average_rating'] : '0.0'; ?> / 5</p>
                <a href="/books/show/<?= $book['id']; ?>">View Details</a>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
</body>
</html>
