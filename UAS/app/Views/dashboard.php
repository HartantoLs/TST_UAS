<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Siap UTBK</title>
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
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--light-color);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .dashboard-card {
            background: var(--card-bg);
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .card-icon {
            background: var(--light-color);
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .card-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .progress-card {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .progress-card .card-title,
        .progress-card .card-description {
            color: white;
        }

        .status-badge {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            display: inline-block;
            font-size: 0.9rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            margin: 1rem 0;
        }

        .carousel-container {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .carousel-item img {
            border-radius: 15px;
            height: 300px;
            object-fit: cover;
        }

        .action-button {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-button:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .carousel-caption{
            color: black;
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container">
        <!-- Welcome Banner -->
        <div class="row mb-4 mt-4">
            <div class="col-12">
                <div class="dashboard-card progress-card">
                    <h2>Selamat Datang, <?= esc(session()->get('user')->username) ?>!</h2>
                    <p>Progress belajar Anda minggu ini</p>
                    <div class="stat-number">85%</div>
                    <span class="status-badge">
                        <i class="fas fa-arrow-up"></i> 15% dari minggu lalu
                    </span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row g-4">
            <!-- Forum Diskusi Card -->
            <div class="col-md-6 col-lg-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="card-title">Forum Diskusi</h3>
                    <p class="card-description">Bergabung dan ajukan pertanyaan mengenai UTBK.</p>
                    <a href="/forum" class="action-button">
                        Kunjungi Forum
                    </a>
                </div>
            </div>

            <!-- Quick Start Card -->
            <div class="col-md-6 col-lg-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <h3 class="card-title">Latihan Soal</h3>
                    <p class="card-description">Kerjakan ribuan soal latihan UTBK dengan pengalaman seperti di UTBK.</p>
                    <a href="test/start" class="action-button">
                        Mulai Latihan
                    </a>
                </div>
            </div>

            <!-- Progress Tracking -->
            <div class="col-md-6 col-lg-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="card-title">Progress</h3>
                    <p class="card-description">Pantau perkembangan belajar dan nilai tryout Anda.</p>
                    <a href="/test/progress" class="action-button">
                        Lihat Progress
                    </a>
                </div>
            </div>

            <!-- Study Schedule -->
            <div class="col-md-6 col-lg-3">
                <div class="dashboard-card">
                    <div class="card-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="card-title">Coming Soon</h3>
                    <p class="card-description">Halaman ini masih berada pada tahap pembuatan dan pengembangan.</p>
                    <a href="/dashboard" class="action-button">
                        Coming Soon
                    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <div id="dashboardCarousel" class="carousel slide carousel-container" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?= base_url('assets/images/tipsfin.jpg'); ?>" class="d-block w-100" alt="Tips UTBK">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('assets/images/jadwalfin.jpg'); ?>" class="d-block w-100" alt="Jadwal UTBK">
                            </div>
                            <div class="carousel-item">
                                <img src="<?= base_url('assets/images/materifin.jpg'); ?>" class="d-block w-100" alt="Materi UTBK">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
