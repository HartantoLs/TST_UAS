<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Left side: Background and description -->
        <div class="relative hidden lg:flex lg:w-1/2 bg-[#85A98F]">
            <div class="relative z-20 flex w-full flex-col p-10">
                <div class="flex items-center text-2xl font-semibold text-white">
                    <i data-lucide="library-big" class="h-9 w-9 mr-2"></i>
                    Belajar UTBK
                </div>
                <div class="mt-auto">
                    <blockquote class="space-y-2">
                        <p class="text-lg text-white">
                            "Platform pembelajaran yang membantu Anda memahami materi Penalaran Kuantitatif dengan lebih baik melalui materi dan pembahasan soal yang komprehensif, untuk masuk ke 
                            <span class="font-bold">Perguruan Tinggi impian</span>."
                        </p>
                        <footer class="text-sm text-white/80">Tim Belajar UTBK</footer>
                    </blockquote>
                </div>
            </div>
        </div>

        <!-- Right side: Login form -->
        <div class="w-full lg:w-1/2 bg-[#D3F1DF] px-4 lg:px-8">
            <div class="mx-auto flex w-full flex-col justify-center min-h-screen max-w-[350px] space-y-6">
                <!-- Show logo on mobile only -->
                <div class="flex items-center justify-center gap-2 text-xl font-semibold text-[#525B44] lg:hidden mb-4">
                    <i data-lucide="library-big" class="h-8 w-8"></i>
                    Belajar UTBK
                </div>

                <div class="flex flex-col space-y-2 text-center">
                    <h1 class="text-2xl font-semibold tracking-tight text-[#525B44]">
                        Login to your account
                    </h1>
                    <p class="text-sm text-[#5A6C57]">
                        Enter your email below to login to your account
                    </p>
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?= session()->getFlashdata('error') ?></span>
                    </div>
                <?php endif; ?>

                <form action="/authlouis/loginProcess" method="post" class="space-y-4">
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-[#525B44]">Email</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required 
                            class="w-full px-3 py-2 border border-[#85A98F] rounded-md text-[#525B44] focus:outline-none focus:ring-2 focus:ring-[#85A98F] bg-white"
                            placeholder="m@example.com"
                        >
                    </div>
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-[#525B44]">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="w-full px-3 py-2 border border-[#85A98F] rounded-md text-[#525B44] focus:outline-none focus:ring-2 focus:ring-[#85A98F] bg-white"
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="w-full py-2 px-4 bg-[#85A98F] hover:bg-[#5A6C57] text-white rounded-md transition-colors"
                    >
                        Login
                    </button>
                </form>

                <p class="text-center text-sm text-[#5A6C57]">
                    Don't have an account?
                    <a href="/authlouis/signup" class="underline hover:text-[#525B44] font-medium">
                        Sign up
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>