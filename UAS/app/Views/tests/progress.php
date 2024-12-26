<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Progress Tes UTBK PK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .progress-container {
            margin-top: 30px;
            margin-bottom: 50px;
        }
        .progress-card {
            padding: 20px;
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container-fluid progress-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">Progress Tes UTBK PK</h2>

                <?php if(empty($tests)): ?>
                    <div class="alert alert-info">
                        Anda belum mengambil tes apapun. <a href="/test/start" class="alert-link">Mulai Tes</a> sekarang!
                    </div>
                <?php else: ?>
                    <?php foreach($tests as $test): ?>
                        <div class="progress-card">
                            <h5>Tanggal Tes: <?= date('d M Y, H:i', strtotime($test['created_at'])) ?></h5>
                            <p>Skor: <?= esc($test['score']) ?> dari <?= esc($total) ?></p>
                            <a href="/test/result/<?= esc($test['id']) ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat Hasil</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="d-flex justify-content-center">
                    <a href="/test/start" class="btn btn-success"><i class="fas fa-play-circle"></i> Mulai Tes Baru</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
