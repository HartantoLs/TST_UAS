<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi - Siap UTBK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #6b7280;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --border: #e5e7eb;
            --shadow: 0 1px 3px rgba(0,0,0,0.1);
            --shadow-hover: 0 4px 6px rgba(0,0,0,0.1);
            --radius: 0.5rem;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--background);
            color: var(--text-primary);
            line-height: 1.5;
        }

        .navbar {
            background: var(--card-bg);
            box-shadow: var(--shadow);
            padding: 1rem 0;
        }

        .navbar-brand {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.25rem;
        }

        .container {
            max-width: 1200px;
            padding: 2rem 1rem;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: all 0.2s ease;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--border);
            padding: 1.25rem;
        }

        .card-body {
            padding: 1.25rem;
        }

        .book-card {
            display: flex;
            align-items: start;
            gap: 1rem;
            padding: 1.25rem;
        }

        .book-icon {
            width: 48px;
            height: 48px;
            background: var(--primary);
            color: white;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-info h3 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
        }

        .book-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .question-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .question-meta {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .answer {
            margin-left: 3rem;
            padding: 1rem;
            background: var(--background);
            border-radius: var(--radius);
            margin-top: 1rem;
        }

        .form-control {
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 0.75rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-outline {
            border: 1px solid var(--border);
            background: transparent;
            color: var(--text-primary);
        }

        .btn-outline:hover {
            background: var(--background);
            border-color: var(--primary);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .grid-books {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 768px) {
            .grid-books {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?= view('partials/navbar') ?>
    <!-- Main Content -->
    <div class="container">
        <!-- Books Section -->
        <div class="section-header">
            <h2>Daftar Buku</h2>
            <button class="btn btn-outline">Lihat Semua</button>
        </div>

        <div class="grid-books" id="books-list">
            <!-- Books will be loaded here -->
        </div>

        <!-- Forum Section -->
        <h2 class="mb-4">Forum Diskusi</h2>
        
        <?php if (isset($username)): ?>
            <p>Selamat datang, <strong><?= esc($username) ?></strong>!</p>
        <?php endif; ?>

        <?php if (session('success')): ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php endif; ?>

        <!-- New Question Form -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Buat Pertanyaan Baru</h5>
            </div>
            <div class="card-body">
                <form action="<?= site_url('/forum/addQuestion') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <textarea 
                            name="question" 
                            class="form-control" 
                            placeholder="Tulis pertanyaan Anda di sini..." 
                            rows="3"
                            required
                        ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-paper-plane me-2"></i>
                        Kirim Pertanyaan
                    </button>
                </form>
            </div>
        </div>

        <!-- Questions List -->
        <?php foreach ($questions as $question): ?>
            <div class="card">
                <div class="card-body">
                    <div class="question-header">
                        <div class="avatar">
                            <?= strtoupper(substr($question['question_username'], 0, 1)) ?>
                        </div>
                        <div>
                            <h5 class="mb-1"><?= esc($question['question']) ?></h5>
                            <div class="question-meta">
                                Ditanyakan oleh <?= esc($question['question_username']) ?> • 
                                <?= esc($question['created_at']) ?>
                            </div>
                        </div>
                    </div>

                    <!-- Answers -->
                    <?php if (!empty($question['answers'])): ?>
                        <?php foreach ($question['answers'] as $answer): ?>
                            <div class="answer">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="avatar" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                        <?= strtoupper(substr($answer['answer_username'], 0, 1)) ?>
                                    </div>
                                    <div>
                                        <p class="mb-1"><?= esc($answer['answer']) ?></p>
                                        <small class="text-muted">
                                            Dijawab oleh <?= esc($answer['answer_username']) ?> • 
                                            <?= esc($answer['created_at']) ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted ms-5 mt-3">Belum ada jawaban.</p>
                    <?php endif; ?>

                    <!-- Answer Form -->
                    <form action="<?= site_url('/forum/addAnswer/' . $question['id']) ?>" method="POST" class="mt-4">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <textarea 
                                name="answer" 
                                class="form-control" 
                                placeholder="Tulis jawaban Anda..." 
                                rows="2"
                                required
                            ></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">
                            <i class="fas fa-reply me-2"></i>
                            Kirim Jawaban
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const booksList = document.getElementById("books-list");

            // Fetch books data
            fetch('/books')
                .then(response => response.json())
                .then(books => {
                    booksList.innerHTML = books.map(book => `
                        <div class="card">
                            <div class="book-card">
                                <div class="book-icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="book-info">
                                    <h3>${book.title}</h3>
                                    <div class="book-rating">
                                        <i class="fas fa-star text-warning"></i>
                                        ${parseFloat(book.average_rating).toFixed(1)}
                                    </div>
                                    <small class="text-muted d-block mt-1">
                                        Penulis: ${book.author}
                                    </small>
                                    <p class="mt-2 mb-0 text-secondary">
                                        ${book.description}
                                    </p>
                                    <a href="${book.link}" class="btn btn-primary mt-3" target="_blank">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    `).join('');
                })
                .catch(error => {
                    console.error("Error fetching books:", error);
                    booksList.innerHTML = `
                        <div class="alert alert-danger">
                            Terjadi kesalahan saat memuat data buku.
                        </div>
                    `;
                });
        });
    </script>
</body>
</html>