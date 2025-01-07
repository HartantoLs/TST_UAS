<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books List</title>
</head>
<body>
    <h1>Books List</h1>
    <div class="books">
        <?php foreach ($books as $book): ?>
            <div class="book-card">
                <h2><?= esc($book['title']) ?></h2>
                <p>Author: <?= esc($book['author']) ?></p>
                <p>Average Rating: <?= number_format($book['average_rating'], 1) ?> / 5</p>
                <a href="<?= base_url('books/show/' . $book['id']) ?>">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
