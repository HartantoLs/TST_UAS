<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siap UTBK - Persiapkan Masa Depanmu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #283593;
            --accent-color: #3949ab;
            --light-color: #e8eaf6;
            --text-color: #283593;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background-color: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: 600;
        }

        .nav-link {
            color: var(--text-color) !important;
            font-weight: 500;
            margin: 0 0.5rem;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            border-color: var(--accent-color);
            color: var(--accent-color);
            padding: 0.8rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .hero-section {
            min-height: calc(100vh - 76px);
            background: linear-gradient(135deg, #fff 50%, var(--light-color) 50%);
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            padding: 6rem 0;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-color);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .hero-section {
                background: linear-gradient(180deg, #fff 60%, var(--light-color) 60%);
            }
            
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-content {
                padding: 3rem 0;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-graduation-cap me-2"></i>
                Siap UTBK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary me-2" href="/login">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="/signup">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Persiapkan Masa Depanmu Bersama Kami</h1>
                    <p class="hero-subtitle">
                        Platform belajar online terbaik untuk persiapan UTBK. Dengan materi lengkap, 
                        tryout, dan bimbingan dari mentor berpengalaman.
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="/signup" class="btn btn-primary">Mulai Belajar</a>
                        <a href="/features" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <!-- <img src="<?= base_url('assets/images/study-illustration.svg'); ?>"  -->
                         <!-- alt="Students studying" class="img-fluid"> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-book-reader feature-icon"></i>
                        <h4>Materi Lengkap</h4>
                        <p>Akses ke ribuan materi pembelajaran yang terstruktur</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-chalkboard-teacher feature-icon"></i>
                        <h4>Mentor Terbaik</h4>
                        <p>Dibimbing langsung oleh mentor berpengalaman</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-tasks feature-icon"></i>
                        <h4>Tryout UTBK</h4>
                        <p>Latihan soal dan simulasi ujian seperti UTBK asli</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-card">
                        <i class="fas fa-chart-line feature-icon"></i>
                        <h4>Progress Tracking</h4>
                        <p>Pantau perkembangan belajarmu secara real-time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>