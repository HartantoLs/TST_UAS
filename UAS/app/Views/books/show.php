<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= esc($book['title']) ?> Details</title>
</head>
<body>
    <h1><?= esc($book['title']) ?></h1>
    <p>Author: <?= esc($book['author']) ?></p>
    <p>Description: <?= esc($book['description']) ?></p>
    <p>Link: <a href="<?= esc($book['link']) ?>" target="_blank">Read More</a></p>
    <p>Published Date: <?= esc($book['published_at']) ?></p>

    <h2>Reviews</h2>
    <?php if (count($reviews) > 0): ?>
        <ul>
            <?php foreach ($reviews as $review): ?>
                <li>
                    <p>Rating: <?= esc($review['rating']) ?> / 5</p>
                    <p>Review: <?= esc($review['review']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No reviews yet.</p>
    <?php endif; ?>

    <a href="<?= base_url('books') ?>">Back to Books</a>
</body>
</html>
