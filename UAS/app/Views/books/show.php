<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details - <?= esc($book['title']) ?></title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <style>
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            color: #D3F1DF;
            transition: color 0.2s;
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #85A98F;
        }
    </style>
</head>
<body class="min-h-screen bg-[#D3F1DF]">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <a href="/booksPage" 
               class="flex items-center gap-2 text-[#5A6C57] hover:text-[#525B44] transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                <span>Back to Books List</span>
            </a>
            
            <div class="flex items-center gap-4">
                <?php if (session()->get('username')): ?>
                    <span class="text-[#5A6C57]">Welcome, <?= session()->get('username'); ?>!</span>
                    <a href="/authlouis/logout" 
                       class="flex items-center gap-2 bg-[#85A98F] text-white px-4 py-2 rounded-lg hover:bg-[#5A6C57] transition-colors">
                        <i data-lucide="log-out" class="w-4.5 h-4.5"></i>
                        Logout
                    </a>
                <?php else: ?>
                    <a href="/authlouis/login" 
                       class="flex items-center gap-2 bg-[#85A98F] text-white px-4 py-2 rounded-lg hover:bg-[#5A6C57] transition-colors">
                        <i data-lucide="log-in" class="w-4.5 h-4.5"></i>
                        Login to leave reviews
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Book Details Card -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <div class="flex items-start gap-4 mb-6">
                <div class="p-4 bg-[#D3F1DF] rounded-lg">
                    <i data-lucide="book-open" class="w-8 h-8 text-[#5A6C57]"></i>
                </div>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-[#525B44] mb-2"><?= esc($book['title']) ?></h1>
                    <div class="flex items-center gap-2 mb-4">
                        <i data-lucide="user" class="w-5 h-5 text-[#85A98F]"></i>
                        <span class="text-[#5A6C57] font-medium"><?= esc($book['author']) ?></span>
                    </div>
                </div>
                <div class="flex items-center gap-1 bg-[#D3F1DF] px-4 py-2 rounded-lg">
                    <i data-lucide="star" class="w-5 h-5 text-[#85A98F] fill-[#85A98F]"></i>
                    <span class="text-[#5A6C57] font-medium">
                        <?= number_format($book['average_rating'] ?? 0, 1) ?> / 5
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-xl font-semibold text-[#525B44] mb-4">About this Book</h2>
                    <p class="text-[#5A6C57] mb-4"><?= nl2br(esc($book['description'])) ?></p>
                    
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <i data-lucide="calendar" class="w-5 h-5 text-[#85A98F]"></i>
                            <span class="text-[#5A6C57]">Published: <?= esc($book['published_at']) ?></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i data-lucide="tag" class="w-5 h-5 text-[#85A98F]"></i>
                            <span class="text-[#5A6C57]">Topics: <?= esc($book['topics_covered']) ?></span>
                        </div>
                        <?php if ($book['link']): ?>
                        <a href="<?= esc($book['link']) ?>" target="_blank" 
                           class="flex items-center gap-2 text-[#85A98F] hover:text-[#5A6C57] transition-colors">
                            <i data-lucide="external-link" class="w-5 h-5"></i>
                            <span>View External Link</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div>
                    <h2 class="text-xl font-semibold text-[#525B44] mb-4">Reviews</h2>
                    <div class="space-y-4 max-h-[400px] overflow-y-auto pr-4">
                        <?php if (count($reviews) > 0): ?>
                            <?php foreach ($reviews as $review): ?>
                                <div class="bg-[#b9d5c1] bg-opacity-30 p-4 rounded-md shadow-sm">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-medium text-[#525B44]"><?= esc($review['reviewer_name']) ?></span>
                                        <div class="flex items-center gap-1">
                                            <i data-lucide="star" class="w-4 h-4 text-[#85A98F] fill-[#85A98F]"></i>
                                            <span class="text-[#5A6C57]"><?= $review['rating'] ?> / 5</span>
                                        </div>
                                    </div>
                                    <p class="text-[#5A6C57]"><?= nl2br(esc($review['review'])) ?></p>
                                    <?php if (session()->get('id') == $review['user_id']): ?>
                                        <form action="/books/deleteReview/<?= $review['id'] ?>" method="post">
                                            <button type="submit" class="mt-2 text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-[#5A6C57] italic">No reviews yet. Be the first to review!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Review Form -->
        <?php if (session()->get('id')): ?>
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-xl font-semibold text-[#525B44] mb-4">Write a Review</h2>
            <form action="/books/addReview" method="post" class="space-y-4">
                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                <input type="hidden" name="user_id" value="<?= session()->get('id') ?>">

                <div>
                    <label class="block text-[#5A6C57] mb-2">Rating:</label>
                    <div class="star-rating text-2xl mb-2">
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
                </div>

                <div>
                    <label for="review" class="block text-[#5A6C57] mb-2">Your Review:</label>
                    <textarea 
                        name="review" 
                        id="review" 
                        rows="4" 
                        maxlength="500" 
                        required
                        class="w-full rounded-lg border-[#D3F1DF] focus:border-[#85A98F] focus:ring focus:ring-[#85A98F] focus:ring-opacity-10"
                    ></textarea>
                </div>

                <button type="submit" 
                        class="bg-[#85A98F] text-white px-6 py-2 rounded-lg hover:bg-[#5A6C57] transition-colors">
                    Submit Review
                </button>
            </form>
        </div>
        <?php endif; ?>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>