<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
<body class="bg-[#D3F1DF]">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 md:w-72 bg-[#D3F1DF] shadow-lg flex flex-col">
            <div class="p-4 bg-[#85A98F] flex items-center gap-3">
                <i data-lucide="layout-dashboard" class="w-8 h-8 text-white"></i>
                <span class="text-white font-semibold text-lg">Dashboard</span>
            </div>
            
            <div class="flex-1 py-6">
                <nav class="px-4 space-y-4">
                    <a href="<?= base_url('booksPage') ?>" 
                       class="flex items-center gap-3 p-3 rounded-lg text-[#5A6C57] hover:bg-white hover:text-[#525B44] transition-all group">
                        <i data-lucide="book-open" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                        <span>Koleksi Buku</span>
                    </a>
                    
                    <a href="<?= base_url('pembahasanSoal') ?>" 
                       class="flex items-center gap-3 p-3 rounded-lg text-[#5A6C57] hover:bg-white hover:text-[#525B44] transition-all group">
                        <i data-lucide="help-circle" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                        <span>Pembahasan Soal</span>
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-gray-200 mt-auto">
                <a href="<?= base_url('authlouis/logout') ?>" 
                   class="flex items-center gap-3 p-3 rounded-lg text-red-500 hover:bg-red-50 transition-all group">
                    <i data-lucide="log-out" class="w-6 h-6 group-hover:scale-110 transition-transform"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Welcome Message -->
            <div class="mb-8 bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center gap-3">
                    <div class="p-3 bg-[#D3F1DF] rounded-lg">
                        <i data-lucide="user" class="w-6 h-6 text-[#5A6C57]"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-[#525B44]">Welcome back,</h2>
                        <p class="text-[#5A6C57] text-2xl"><?= esc(session()->get('username')) ?></p>
                    </div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="flex gap-8">
                <!-- Progress Stats -->
                <div class="w-[35%] space-y-6">
                    <!-- Materials Read Progress -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-3 bg-[#D3F1DF] rounded-lg">
                                <i data-lucide="book" class="w-6 h-6 text-[#5A6C57]"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-[#525B44]">Materials Read</h3>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[#5A6C57]">Progress</span>
                            <span class="text-[#85A98F] font-medium">3/5</span>
                        </div>
                        <div class="w-full bg-[#D3F1DF] rounded-full h-2.5">
                            <div class="bg-[#85A98F] h-2.5 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>

                    <!-- Tests Reviewed Progress -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-3 bg-[#D3F1DF] rounded-lg">
                                <i data-lucide="check-circle" class="w-6 h-6 text-[#5A6C57]"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-[#525B44]">Tests Reviewed</h3>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[#5A6C57]">Progress</span>
                            <span class="text-[#85A98F] font-medium">2/5</span>
                        </div>
                        <div class="w-full bg-[#D3F1DF] rounded-full h-2.5">
                            <div class="bg-[#85A98F] h-2.5 rounded-full" style="width: 40%"></div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="w-[65%] space-y-6">
                    <!-- Books Preview -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-[#D3F1DF] rounded-lg">
                                    <i data-lucide="book-open" class="w-6 h-6 text-[#5A6C57]"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-[#525B44]">Koleksi Buku</h3>
                            </div>
                            <a href="<?= base_url('booksPage') ?>" 
                               class="flex items-center gap-2 text-[#85A98F] hover:text-[#5A6C57] transition-colors group">
                                <span>View All</span>
                                <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <p class="text-sm text-[#5A6C57] mb-4">
                            Jelajahi koleksi buku pilihan yang dirancang untuk meningkatkan pemahaman Anda tentang Penalaran Kuantitatif. Temukan pengetahuan dan wawasan baru di setiap judul.
                        </p>
                    </div>

                    <!-- Pembahasan Preview -->
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-[#D3F1DF] rounded-lg">
                                    <i data-lucide="help-circle" class="w-6 h-6 text-[#5A6C57]"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-[#525B44]">Pembahasan Soal</h3>
                            </div>
                            <a href="<?= base_url('pembahasanSoal') ?>" 
                               class="flex items-center gap-2 text-[#85A98F] hover:text-[#5A6C57] transition-colors group">
                                <span>View All</span>
                                <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                        <p class="text-sm text-[#5A6C57] mb-4">
                        Akses penjelasan dan solusi mendetail untuk berbagai pertanyaan umum. Perkuat pemahaman Anda tentang topik yang kompleks dan tingkatkan keterampilan pemecahan masalah Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>