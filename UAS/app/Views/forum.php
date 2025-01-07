<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .forum-question-card {
            margin-bottom: 20px;
        }

        .answer-card {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .answer-form {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Forum Diskusi</h1>

        <!-- Menampilkan Error (Jika ada) -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk Menambah Pertanyaan -->
        <div class="mb-4">
            <form action="<?= site_url('forum/addQuestion') ?>" method="post">
                <div class="mb-3">
                    <label for="question" class="form-label">Tanyakan sesuatu:</label>
                    <input type="text" name="question" id="question" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
            </form>
        </div>

        <!-- Daftar Pertanyaan -->
        <h3 class="mb-3">Daftar Pertanyaan</h3>

        <?php if (isset($questions) && count($questions) > 0): ?>
            <?php foreach ($questions as $question): ?>
                <div class="forum-question-card card">
                    <div class="card-header">
                        <strong><?= esc($question['user_name']) ?></strong> - <?= esc($question['created_at']) ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($question['question']) ?></h5>

                        <!-- Menampilkan Jawaban -->
                        <div class="answers-section">
                            <?php
                                $answers = $forumModel->getAnswers($question['id']);
                                if (count($answers) > 0):
                                    foreach ($answers as $answer):
                            ?>
                                        <div class="answer-card">
                                            <p><strong>Jawaban:</strong> <?= esc($answer['answer']) ?></p>
                                            <p><small>Dikirim oleh: <?= esc($answer['user_id']) ?> pada <?= esc($answer['created_at']) ?></small></p>
                                        </div>
                            <?php
                                    endforeach;
                                else:
                            ?>
                                    <p>Belum ada jawaban.</p>
                            <?php endif; ?>
                        </div>

                        <!-- Form untuk Menambahkan Jawaban -->
                        <form action="<?= site_url('forum/addAnswer/' . $question['id']) ?>" method="post" class="answer-form">
                            <label for="answer" class="form-label">Jawaban:</label>
                            <textarea name="answer" id="answer" class="form-control" required></textarea>
                            <button type="submit" class="btn btn-success mt-2">Kirim Jawaban</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pertanyaan di forum saat ini.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
