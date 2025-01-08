<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Buku - Siap UTBK</title>
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

        .card-body {
            padding: 1.5rem;
        }

        .recommendation-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .recommendation-header i {
            font-size: 1.25rem;
            color: var(--accent-color);
        }

        .topic-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--light-color);
            color: var(--secondary-color);
            border-radius: 1rem;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
        }

        .book-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .book-item {
            padding: 1.25rem;
            background: var(--light-color);
            border-radius: var(--radius);
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            transition: all 0.2s ease;
        }

        .book-item:hover {
            background: var(--card-bg);
            box-shadow: var(--shadow);
        }

        .book-item:last-child {
            margin-bottom: 0;
        }

        .book-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .book-author {
            color: var(--secondary-color);
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .book-description {
            color: var(--text-color);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
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

        .loading {
            text-align: center;
            padding: 2rem;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .error-message {
            text-align: center;
            color: #ef4444;
            padding: 1rem;
            background: #fee2e2;
            border-radius: var(--radius);
            margin: 1rem 0;
            border: 1px solid #dc2626;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.1rem;
            }
            
            .nav-link {
                padding: 0.5rem 0.75rem !important;
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
        <h1 class="page-title">Rekomendasi Buku</h1>
        <div id="recommendations">
            <div class="loading">
                <i class="fas fa-circle-notch fa-spin me-2"></i>
                Memuat rekomendasi...
            </div>
        </div>
    </div>

    <script>
        async function fetchTestResults() {
            const response = await fetch('/test/results');
            if (!response.ok) {
                throw new Error('Gagal mengambil data hasil tes.');
            }
            return response.json();
        }

        async function fetchBooks() {
            const response = await fetch('/books');
            if (!response.ok) {
                throw new Error('Gagal mengambil data buku.');
            }
            return response.json();
        }

        function matchBooksWithQuestions(tests, books) {
            const recommendations = [];
            const displayedQuestions = new Set();

            tests.forEach(test => {
                test.answers.forEach(answer => {
                    if (displayedQuestions.has(answer.question_text)) {
                        return;
                    }

                    const matchedBooks = books.filter(book => {
                        const bookTopics = book.topics_covered.split(',').map(topic => topic.trim().toLowerCase());
                        const questionTopic = answer.topic_covered.toLowerCase();
                        return bookTopics.some(bookTopic => questionTopic.includes(bookTopic));
                    });

                    displayedQuestions.add(answer.question_text);
                    recommendations.push({
                        question_text: answer.question_text,
                        topic_covered: answer.topic_covered,
                        books: matchedBooks
                    });
                });
            });

            return recommendations;
        }

        function displayRecommendations(recommendations) {
            const container = document.getElementById('recommendations');
            container.innerHTML = '';

            if (recommendations.length === 0) {
                container.innerHTML = `
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Tidak ada rekomendasi yang ditemukan.
                    </div>
                `;
                return;
            }

            recommendations.forEach(rec => {
                const card = document.createElement('div');
                card.classList.add('card');

                card.innerHTML = `
                    <div class="card-body">
                        <div class="recommendation-header">
                            <i class="fas fa-question-circle"></i>
                            ${rec.question_text}
                        </div>
                        <div class="topic-badge">
                            <i class="fas fa-tag me-2"></i>
                            ${rec.topic_covered}
                        </div>
                        <h5 class="mb-3">
                            <i class="fas fa-book me-2"></i>
                            Buku Rekomendasi:
                        </h5>
                        <ul class="book-list">
                            ${rec.books.length > 0 
                                ? rec.books.map(book => `
                                    <li class="book-item">
                                        <div class="book-title">${book.title}</div>
                                        <div class="book-author">
                                            <i class="fas fa-user me-1"></i>
                                            ${book.author}
                                        </div>
                                        <div class="book-description">${book.description}</div>
                                        <a href="${book.link}" target="_blank" class="btn btn-primary">
                                            <i class="fas fa-external-link-alt"></i>
                                            Lihat Buku
                                        </a>
                                    </li>
                                `).join('')
                                : '<li class="book-item text-center">Tidak ada buku yang sesuai untuk soal ini.</li>'
                            }
                        </ul>
                    </div>
                `;

                container.appendChild(card);
            });
        }

        async function main() {
            try {
                const [tests, books] = await Promise.all([fetchTestResults(), fetchBooks()]);
                const recommendations = matchBooksWithQuestions(tests, books);
                displayRecommendations(recommendations);
            } catch (error) {
                document.getElementById('recommendations').innerHTML = `
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        Error: ${error.message}
                    </div>
                `;
            }
        }

        main();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>