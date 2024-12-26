<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Bimbel UTBK PK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .dashboard-card {
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        .dashboard-card a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container dashboard-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="dashboard-card">
                    <!-- Perbaikan di sini -->
                    <h3>Selamat Datang, <?= esc(session()->get('user')->username) ?>!</h3>
                    <p>Anda dapat memulai simulasi tes UTBK PK atau melihat progress Anda.</p>
                    <div class="d-flex justify-content-center">
                        <a href="/test/start" class="btn btn-success me-3"><i class="fas fa-play-circle"></i> Mulai Tes</a>
                        <a href="/test/progress" class="btn btn-primary"><i class="fas fa-chart-line"></i> Progress</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
