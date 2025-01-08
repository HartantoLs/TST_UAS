<!DOCTYPE html>
<html>
<head>
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
            font-size: 1.5rem;
            cursor: pointer;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            margin: 0;
            padding: 0;
        }<div class="mb-3">
            <a href="/books" class="btn btn-secondary btn-sm">&larr; Back to Books List</a>
        </div>
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5c518;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <!-- Tombol Back -->
        <div class="mb-3">
            <a href="/booksPage" class="btn btn-secondary btn-sm">&larr; Back</a>
        </div>

        <!-- Welcome -->
        <?php if (session()->get('username')): ?>
            <div class="mb-3">
                <p class="text-end">Welcome, <strong><?= session()->get('username'); ?></strong>!</p>
                <a href="/authlouis/logout" class="btn btn-danger btn-sm float-end">Logout</a>
            </div>
        <?php else: ?>
            <p class="text-end"><a href="/authlouis/login" class="btn btn-primary btn-sm">Login</a> to leave a review.</p>
        <?php endif; ?>

        <!-- Book Details -->
        <h1><?= $book['title']; ?></h1>
        <p><strong>Author:</strong> <?= $book['author']; ?></p>
        <p><strong>Description:</strong> <?= $book['description']; ?></p>
        <p><strong>Link:</strong> <a href="<?= $book['link']; ?>" target="_blank"><?= $book['link']; ?></a></p>
        <p><strong>Published At:</strong> <?= $book['published_at']; ?></p>
        <p><strong>Topics Covered:</strong> <?= $book['topics_covered']; ?></p>
        <h3>Average Rating: <?= isset($book['average_rating']) ? $book['average_rating'] : '0.0'; ?> / 5</h3>

        <!-- Reviews -->
        <h2>Reviews</h2>
        <?php if (count($reviews) > 0): ?>
            <?php foreach ($reviews as $review): ?>
                <p><strong>Reviewer:</strong> <?= $review['reviewer_name']; ?></p>
                <p><strong>Rating:</strong> <?= $review['rating']; ?> / 5</p>
                <p><strong>Review:</strong> <?= $review['review']; ?></p>
                <hr>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>

        <!-- Add Review Form -->
        <?php if (session()->get('id')): ?>
            <h2>Add a Review</h2>
            <form action="/books/addReview" method="post">
                <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                <input type="hidden" name="user_id" value="<?= session()->get('id'); ?>">

                <label for="rating">Rating:</label>
                <div class="star-rating mb-3">
                    <input type="radio" name="rating" id="rating-5" value="5">
                    <label for="rating-5">★</label>
                    <input type="radio" name="rating" id="rating-4" value="4">
                    <label for="rating-4">★</label>
                    <input type="radio" name="rating" id="rating-3" value="3">
                    <label for="rating-3">★</label>
                    <input type="radio" name="rating" id="rating-2" value="2">
                    <label for="rating-2">★</label>
                    <input type="radio" name="rating" id="rating-1" value="1">
                    <label for="rating-1">★</label>
                </div>

                <label for="review">Review:</label>
                <textarea name="review" id="review" class="form-control mb-3" maxlength="500" required></textarea>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
