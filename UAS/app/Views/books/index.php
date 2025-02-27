<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books List</title>
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
</head>
<body class="min-h-screen bg-[#D3F1DF]">
    <div class="w-16 bg-[#D3F1DF] shadow-lg flex flex-col h-screen fixed left-0 top-0">
        <div class="p-4 bg-[#85A98F] flex justify-center">
            <a href="<?= base_url('louisdashboard.php') ?>" class="group">
                <i data-lucide="layout-dashboard" class="w-8 h-8 text-white group-hover:scale-110 transition-transform"></i>
                <span class="absolute left-full ml-2 px-2 py-1 bg-[#85A98F] text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
                    Dashboard
                </span>
            </a>
        </div>
        
        <div class="flex-1 py-6">
            <nav class="space-y-4">
                <div class="px-2">
                    <a href="<?= base_url('booksPage') ?>" 
                    class="flex justify-center p-3 rounded-lg text-[#5A6C57] hover:bg-white hover:text-[#525B44] transition-all group relative">
                        <i data-lucide="book-open" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                        <span class="absolute left-full ml-2 px-2 py-1 bg-[#85A98F] text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
                            Koleksi Buku
                        </span>
                    </a>
                </div>
                
                <div class="px-2">
                    <a href="<?= base_url('pembahasanSoal') ?>" 
                    class="flex justify-center p-3 rounded-lg text-[#5A6C57] hover:bg-white hover:text-[#525B44] transition-all group relative">
                        <i data-lucide="help-circle" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                        <span class="absolute left-full ml-2 px-2 py-1 bg-[#85A98F] text-white text-sm rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
                            Pembahasan Soal
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Add margin to main content to account for fixed navbar -->
    <div class="ml-16">
        <!-- Your existing page content goes here -->
    </div>
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <a href="/louisdashboard.php" 
               class="flex items-center gap-2 text-[#5A6C57] hover:text-[#525B44] transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                <span>Back to Dashboard</span>
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

        <!-- Title Section -->
        <div class="flex items-center gap-3 mb-8">
            <i data-lucide="book-open" class="w-8 h-8 text-[#5A6C57]"></i>
            <h1 class="text-3xl font-bold text-[#525B44]">Books List</h1>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($books as $book): ?>
                <div class="group bg-[#bcdcc8] rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-[#85A98F]">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="p-3 bg-[#D3F1DF] rounded-lg">
                                <i data-lucide="book" class="w-6 h-6 text-[#5A6C57]"></i>
                            </div>
                            <div class="flex items-center gap-1">
                                <i data-lucide="star" class="w-5 h-5 text-[#85A98F] fill-[#85A98F]"></i>
                                <span class="text-[#5A6C57] font-medium">
                                    <?= number_format($book['average_rating'] ?? 0, 1) ?> / 5
                                </span>
                            </div>
                        </div>
                        
                        <h2 class="text-xl font-semibold text-[#525B44] mb-2 line-clamp-2">
                            <?= esc($book['title']) ?>
                        </h2>
                        
                        <div class="flex items-center gap-2 mb-4">
                            <i data-lucide="user" class="w-4 h-4 text-[#85A98F]"></i>
                            <p class="text-[#5A6C57]">
                                <?= esc($book['author']) ?>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-[#D3F1DF]">
                            <a href="/books/show/<?= $book['id'] ?>" 
                               class="flex items-center justify-between text-[#85A98F] hover:text-[#5A6C57] font-medium transition-colors group-hover:gap-2">
                                <span>View Details</span>
                                <i data-lucide="arrow-right" class="w-5 h-5 transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>