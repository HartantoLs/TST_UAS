<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Tes UTBK PK</title>
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
            --success-color: #43a047;
            --error-color: #d32f2f;
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

        .result-container {
            padding: 2rem 0;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .result-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .result-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .summary-card {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }

        .summary-card h4 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .question-number {
            background: var(--light-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .question-text {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 1.5rem;
        }

        .answer-section {
            background: var(--light-color);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .correct {
            color: var(--success-color);
            font-weight: 500;
        }

        .incorrect {
            color: var(--error-color);
            font-weight: 500;
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

        .result-icon {
            font-size: 1.2rem;
            margin-left: 0.5rem;
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container result-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="page-title">Hasil Tes UTBK PK</h2>

                <div class="result-card summary-card">
                    <h4><i class="fas fa-chart-bar me-2"></i>Ringkasan Hasil</h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-3">Total Skor: <?= esc($score) ?> dari <?= esc($total) ?></h5>
                            <p class="mb-0">Tanggal Tes: <?= date('d M Y, H:i', strtotime($test['created_at'])) ?></p>
                        </div>
                        <div class="display-4 fw-bold">
                            <?= $total > 0 ? round(($score / $total) * 100) . '%' : 'N/A' ?>
                        </div>
                    </div>
                </div>

                <?php foreach($testAnswers as $index => $ans): ?>
                    <div class="result-card">
                        <div class="question-number">Soal <?= $index + 1 ?></div>
                        <div class="question-text"><?= esc($ans['question_text']) ?></div>
                        
                        <div class="answer-section">
                            <p class="mb-2">Jawaban Anda: 
                                <span class="<?= $ans['is_correct'] ? 'correct' : 'incorrect' ?>">
                                    <?= esc($ans['selected_option']) ?>
                                    <i class="fas <?= $ans['is_correct'] ? 'fa-check-circle' : 'fa-times-circle' ?> result-icon"></i>
                                </span>
                            </p>
                            <?php if(!$ans['is_correct']): ?>
                                <p class="mb-0">Jawaban yang Benar: 
                                    <span class="correct">
                                        <?= esc($ans['correct_option']) ?>
                                        <i class="fas fa-check-circle result-icon"></i>
                                    </span>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="text-center mt-4">
                    <a href="/test/start" class="btn btn-primary">
                        <i class="fas fa-play-circle me-2"></i> Mulai Tes Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>