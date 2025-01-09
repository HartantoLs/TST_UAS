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
            --primary-color: #1a237e;
            --secondary-color: #283593;
            --accent-color: #3949ab;
            --light-color: #e8eaf6;
            --text-color: #283593;
            --border-color: #e0e6ed;
            --card-bg: #ffffff;
            --shadow: 0 2px 4px rgba(26, 35, 126, 0.1);
            --shadow-hover: 0 4px 8px rgba(26, 35, 126, 0.15);
            --radius: 0.75rem;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--light-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .navbar {
            background: var(--card-bg);
            box-shadow: var(--shadow);
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .navbar .container {
            max-width: 1140px;
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 700;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background: var(--light-color);
            color: var(--accent-color) !important;
        }

        .container {
            max-width: 1140px;
            padding: 2rem 1rem;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .welcome-text {
            background: var(--card-bg);
            padding: 1rem;
            border-radius: var(--radius);
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .card-header {
            background: var(--light-color);
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }

        .grid-books {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .book-card {
            display: flex;
            gap: 1.25rem;
            padding: 1.25rem;
        }

        .book-icon {
            width: 56px;
            height: 56px;
            background: var(--accent-color);
            color: white;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .book-info h3 {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .book-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--secondary-color);
            font-size: 0.875rem;
            margin: 0.5rem 0;
        }

        .book-rating i {
            color: #fbbf24;
        }

        .question-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--accent-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .question-content {
            flex: 1;
        }

        .question-content h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .question-meta {
            font-size: 0.875rem;
            color: var(--secondary-color);
        }

        .answer {
            margin-left: 3.5rem;
            padding: 1.25rem;
            background: var(--light-color);
            border-radius: var(--radius);
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
        }

        .answer-header {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .answer .avatar {
            width: 32px;
            height: 32px;
            font-size: 0.875rem;
        }

        .answer-content {
            flex: 1;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 0.875rem;
            color: var(--text-color);
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(57, 73, 171, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--secondary-color);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--accent-color);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-color);
            transform: translateY(-1px);
        }

        .btn-outline {
            border: 2px solid var(--accent-color);
            background: transparent;
            color: var(--accent-color);
        }

        .btn-outline:hover {
            background: var(--accent-color);
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            box-shadow: 0 2px 4px rgba(220, 53, 69, 0.3);
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(220, 53, 69, 0.4);
        }

        .btn-delete:active {
            transform: translateY(0);
            box-shadow: 0 1px 2px rgba(220, 53, 69, 0.2);
        }

        .btn-delete i {
            font-size: 0.75rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .question-actions{
            position: absolute;
            top: 0;
            right: 0;
            margin:3px;
        }
        .answer-actions {
            margin-top: 1rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .delete-form {
            display: inline;
        }

        .alert-success {
            background: #d1fae5;
            border: 1px solid #059669;
            color: #065f46;
            border-radius: var(--radius);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background: #fee2e2;
            border: 1px solid #dc2626;
            color: #991b1b;
            border-radius: var(--radius);
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .grid-books {
                grid-template-columns: 1fr;
            }

            .answer {
                margin-left: 1rem;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap"></i>
                Siap UTBK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(session()->get('user')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/test/start">
                                <i class="fas fa-play-circle me-2"></i>Mulai Tes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/test/progress">
                                <i class="fas fa-chart-line me-2"></i>Progress
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/signup">
                                <i class="fas fa-user-plus me-2"></i>Sign Up
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-title">Forum Diskusi</h1>

        <?php if (isset($username)): ?>
            <div class="welcome-text">
                <i class="fas fa-user-circle me-2"></i>
                Selamat datang, <strong><?= esc($username) ?></strong>!
            </div>
        <?php endif; ?>

        <?php if (session('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <!-- Books Section -->
        <div class="section-header">
            <h2>
                <i class="fas fa-book me-2"></i>
                Daftar Buku
            </h2>
            <button class="btn btn-outline">
                <i class="fas fa-th-list me-2"></i>
                Lihat Semua
            </button>
        </div>

        <div class="grid-books" id="books-list">
            <!-- Books will be loaded here -->
        </div>

        <!-- New Question Form -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i>
                Buat Pertanyaan Baru
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
                        <i class="fas fa-paper-plane"></i>
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
                        <div class="question-content">
                            <h5><?= esc($question['question']) ?></h5>
                            <div class="question-meta">
                                <i class="fas fa-user me-1"></i>
                                <?= esc($question['question_username']) ?> • 
                                <i class="fas fa-clock ms-1 me-1"></i>
                                <?= esc($question['created_at']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="question-actions m-3">
                        <?php if ((int)$question['user_id'] === (int) $user_id): ?>
                            <form action="<?= site_url('/forum/deleteQuestion/' . $question['id']) ?>" method="POST" class="mt-2">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>


                    <!-- Answers -->
                    <?php if (!empty($question['answers'])): ?>
                        <?php foreach ($question['answers'] as $answer): ?>
                            <div class="answer">
                                <div class="answer-header">
                                    <div class="avatar">
                                        <?= strtoupper(substr($answer['answer_username'], 0, 1)) ?>
                                    </div>
                                    <div class="answer-content">
                                        <div class="question-meta">
                                            <?= esc($answer['answer_username']) ?> • 
                                            <?= esc($answer['created_at']) ?>
                                        </div>
                                        <p class="mb-0"><?= esc($answer['answer']) ?></p>
                                    </div>
                                </div>
                                <div class="answer-actions">
                                    <?php if ((int)$answer['user_id'] === (int)$user_id): ?>
                                        <form action="<?= site_url('/forum/deleteAnswer/' . $answer['id']) ?>" method="POST" class="mt-2">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt me-1"></i> Hapus
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="answer" style="text-align: center; color: var(--secondary-color);">
                            <i class="fas fa-comments me-2"></i>
                            Belum ada jawaban.
                        </div>
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
                            <i class="fas fa-reply"></i>
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
                                        <i class="fas fa-star"></i>
                                        ${parseFloat(book.average_rating).toFixed(1)}
                                    </div>
                                    <small class="text-muted d-block">
                                        <i class="fas fa-user me-1"></i>
                                        ${book.author}
                                    </small>
                                    <p class="mt-2 mb-3" style="color: var(--text-color)">
                                        ${book.description}
                                    </p>
                                    <a href="${book.link}" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-external-link-alt"></i>
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
                            <i class="fas fa-exclamation-circle me-2"></i>
                            Terjadi kesalahan saat memuat data buku.
                        </div>
                    `;
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>