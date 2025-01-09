<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Progress Tes UTBK PK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #283593;
            --accent-color: #3949ab;
            --light-color: #e8eaf6;
            --text-color: #283593;
            --border-color: #e0e6ed;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-color);
            min-height: 100vh;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-weight: 700;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--accent-color) !important;
        }

        .progress-container {
            padding: 2rem 0;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .progress-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .progress-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .progress-card h5 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .progress-card p {
            color: #666;
            margin-bottom: 1rem;
        }

        .score-badge {
            background: var(--light-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .btn-success {
            background-color: #43a047;
            border: none;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #2e7d32;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 2rem;
        }

        .alert-info {
            background-color: var(--light-color);
            border: none;
            color: var(--primary-color);
        }

        .alert-link {
            color: var(--accent-color);
            font-weight: 500;
            text-decoration: none;
        }

        .alert-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container progress-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="page-title">Progress Tes UTBK PK</h2>

                <?php if(empty($tests)): ?>
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        Anda belum mengambil tes apapun. <a href="/test/start" class="alert-link">Mulai Tes</a> sekarang!
                    </div>
                <?php else: ?>
                    <?php foreach($tests as $test): ?>
                        <div class="progress-card">
                            <h5><i class="fas fa-calendar-alt me-2"></i>Tanggal Tes: <?= date('d M Y, H:i', strtotime($test['created_at'])) ?></h5>
                            <div class="score-badge">
                                <i class="fas fa-star me-2"></i>
                                Skor: <?= esc($test['score']) ?> dari <?= esc($total) ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="/test/result/<?= esc($test['id']) ?>" class="btn btn-primary">
                                    <i class="fas fa-eye me-2"></i> Lihat Hasil
                                </a>
                                <form action="/test/deleteprogress/<?= esc($test['id']) ?>" method="POST" class="d-inline-block">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt me-2"></i> Hapus Tes
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="text-center mt-4">
                    <a href="/test/start" class="btn btn-success">
                        <i class="fas fa-play-circle me-2"></i> Mulai Tes Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
