<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembahasan Soal</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {}
            }
        }
    </script>
</head>
<body class="min-h-screen bg-[#D3F1DF]">
    <div class="w-16 bg-[#D3F1DF] shadow-lg flex flex-col h-screen fixed left-0 top-0">
        <div class="p-4 bg-[#85A98F] flex justify-center">
            <a href="<?= base_url('louisdashboard.php') ?>" class="group">
                <i data-lucide="layout-dashboard" class="w-8 h-8 text-white group-hover:scale-110 transition-transform"></i>
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
                        Login to view discussions
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Title Section -->
        <div class="flex items-center gap-3 mb-8">
            <i data-lucide="book-open" class="w-8 h-8 text-[#5A6C57]"></i>
            <h1 class="text-3xl font-bold text-[#525B44]">Pembahasan Soal</h1>
        </div>

        <!-- Discussion Container -->
        <div id="discussion-container" class="space-y-6">
            <div class="flex items-center justify-center p-8">
                <i data-lucide="loader-2" class="w-6 h-6 text-[#5A6C57] animate-spin"></i>
                <span class="ml-2 text-[#5A6C57]">Memuat pembahasan...</span>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        document.addEventListener("DOMContentLoaded", async () => {
            const discussionContainer = document.getElementById('discussion-container');

            try {
                const [questionsResponse, formulasResponse] = await Promise.all([
                    fetch('/api/questions'),
                    fetch('/api/book_formulas')
                ]);

                if (!questionsResponse.ok || !formulasResponse.ok) {
                    throw new Error("Gagal mengambil data dari server.");
                }

                const questionsData = await questionsResponse.json();
                const formulasData = await formulasResponse.json();
                const displayedQuestions = new Set();
                let discussionHTML = '';

                questionsData.forEach(question => {
                    if (displayedQuestions.has(question.question_text)) return;
                    displayedQuestions.add(question.question_text);

                    const matchedFormulas = formulasData.filter(formula =>
                        formula.topic_covered.toLowerCase().includes(question.question_type.toLowerCase())
                    );

                    discussionHTML += `
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 border-2 hover:border-[#85A98F]">
                            <div class="bg-[#85A98F] p-4">
                                <div class="flex items-start gap-3">
                                    <div class="p-2 bg-white bg-opacity-20 rounded-lg">
                                        <i data-lucide="help-circle" class="w-6 h-6 text-white"></i>
                                    </div>
                                    <h2 class="text-lg font-semibold text-white">${question.question_text}</h2>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-4">
                                    <i data-lucide="bookmark" class="w-5 h-5 text-[#85A98F]"></i>
                                    <span class="text-[#5A6C57] font-medium">Topik: ${question.topic_covered}</span>
                                </div>
                                
                                <div class="space-y-3">
                                    <h3 class="text-[#525B44] font-semibold flex items-center gap-2">
                                        <i data-lucide="book" class="w-5 h-5 text-[#85A98F]"></i>
                                        Rumus yang Relevan:
                                    </h3>
                                    ${matchedFormulas.length > 0
                                        ? `<div class="space-y-2">
                                            ${matchedFormulas.map(formula => `
                                                <div class="bg-[#D3F1DF] bg-opacity-30 p-3 rounded-lg">
                                                    <div class="font-medium text-[#525B44]">${formula.formula}</div>
                                                    <div class="text-sm text-[#5A6C57]">Topik: ${formula.topic_covered}</div>
                                                </div>
                                            `).join('')}
                                           </div>`
                                        : `<p class="text-[#5A6C57] italic">Tidak ada rumus yang relevan untuk soal ini.</p>`
                                    }
                                </div>
                            </div>
                        </div>
                    `;
                });

                discussionContainer.innerHTML = discussionHTML || `
                    <div class="text-center text-[#5A6C57] italic p-8">
                        <i data-lucide="alert-circle" class="w-6 h-6 mx-auto mb-2"></i>
                        <p>Tidak ada pembahasan tersedia.</p>
                    </div>
                `;

                // Reinitialize icons for dynamically added content
                lucide.createIcons();

            } catch (error) {
                discussionContainer.innerHTML = `
                    <div class="text-center text-red-500 p-8">
                        <i data-lucide="alert-triangle" class="w-6 h-6 mx-auto mb-2"></i>
                        <p>Error: ${error.message}</p>
                    </div>
                `;
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>