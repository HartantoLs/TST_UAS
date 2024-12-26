<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes UTBK PK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .result-container {
            margin-top: 30px;
            margin-bottom: 50px;
        }
        .result-card {
            padding: 20px;
            margin-bottom: 25px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
        }
        .correct {
            color: #198754;
            font-weight: bold;
        }
        .incorrect {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container-fluid result-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">Hasil Tes UTBK PK</h2>

                <div class="result-card">
                    <h4>Total Skor: <?= esc($score) ?> dari <?= esc($total) ?></h4>
                    <p>Tanggal Tes: <?= date('d M Y, H:i', strtotime($test['created_at'])) ?></p>
                </div>

                <?php foreach($testAnswers as $index => $ans): ?>
                    <div class="result-card">
                        <h5>Soal <?= $index + 1 ?>:</h5>
                        <p><?= esc($ans['question_text']) ?></p>
                        <p>Jawaban Anda: 
                            <span class="<?= $ans['is_correct'] ? 'correct' : 'incorrect' ?>">
                                <?= esc($ans['selected_option']) ?>
                                <?= $ans['is_correct'] ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>' ?>
                            </span>
                        </p>
                        <?php if(!$ans['is_correct']): ?>
                            <p>Jawaban yang Benar: <span class="correct"><?= esc($ans['correct_option']) ?></span></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

                <div class="d-flex justify-content-center">
                    <a href="/test/start" class="btn btn-primary"><i class="fas fa-play-circle"></i> Mulai Tes Baru</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
        document.addEventListener("DOMContentLoaded", function () {
            // Hapus timer dari sessionStorage saat halaman hasil dimuat
            sessionStorage.removeItem("testStartTime");
        });
    </script>
</body>
</html>
