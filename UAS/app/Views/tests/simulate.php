<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Tes UTBK PK</title>
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

        .test-container {
            padding: 2rem 0;
        }

        .sidebar-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .question-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .list-group-item {
            border: none;
            margin-bottom: 0.5rem;
            border-radius: 8px !important;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: var(--light-color);
        }

        .answered {
            background-color: var(--light-color) !important;
            color: var(--primary-color);
            font-weight: 500;
        }

        .active {
            background-color: var(--accent-color) !important;
            color: white !important;
            font-weight: 500;
        }

        .question-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .question-text {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 2rem;
        }

        .form-check {
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-check:hover {
            background-color: var(--light-color);
        }

        .form-check-input {
            margin-top: 0.3rem;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .form-check-label {
            margin-left: 0.5rem;
            color: var(--text-color);
            font-weight: 400;
        }

        .btn-primary, .btn-secondary {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #757575;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #616161;
            transform: translateY(-2px);
        }

        #timer {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .timer-label {
            font-size: 0.9rem;
            font-weight: 400;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <?= view('partials/navbar') ?>

    <div class="container test-container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="sidebar-card">
                    <div id="timer">
                        <div class="timer-label">Sisa Waktu</div>
                        <div>20:00</div>
                    </div>
                    <div class="list-group">
                        <?php for ($i = 1; $i <= $total; $i++): ?>
                            <?php 
                                $class = '';
                                if (in_array($i, $answered)) {
                                    $class = 'answered';
                                }
                                if ($i == $current) {
                                    $class = 'active';
                                }
                            ?>
                            <a href="/test/simulate/<?= $i ?>" 
                               class="list-group-item <?= $class ?>" 
                               data-question="<?= $question['id'] ?>" 
                               data-target="<?= $i ?>">
                                <i class="fas <?= in_array($i, $answered) ? 'fa-check-circle' : 'fa-circle' ?> me-2"></i>
                                Soal <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <!-- Question -->
            <div class="col-md-9">
                <div class="question-card">
                    <h1 class="question-title">Soal <?= $current ?> dari <?= $total ?></h1>
                    <div class="question-text"><?= esc($question['question_text']) ?></div>
                    
                    <form id="questionForm" action="<?= $current >= $total ? '/test/submit_test/' . $test_id : '/test/submit_single' ?>" method="post">
                        <?= csrf_field() ?>
                        <?php foreach ($options as $option): ?>
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="selected_option_id"
                                    id="option<?= esc($option['id']) ?>"
                                    value="<?= esc($option['id']) ?>"
                                    <?= $selectedOption == $option['id'] ? 'checked' : '' ?>
                                    required
                                >
                                <label class="form-check-label" for="option<?= esc($option['id']) ?>">
                                    <?= esc($option['option_text']) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                        
                        <input type="hidden" name="question_id" value="<?= esc($question['id']) ?>">
                        <input type="hidden" name="current" value="<?= esc($current) ?>">
                        <input type="hidden" name="total" value="<?= esc($total) ?>">
                        <input type="hidden" name="test_id" value="<?= esc($test_id) ?>">

                        <div class="d-flex justify-content-between mt-4">
                            <?php if ($current > 1): ?>
                                <a href="/test/simulate/<?= $current - 1 ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i> Sebelumnya
                                </a>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                            
                            <button type="submit" class="btn btn-primary">
                                <?php if ($current >= $total): ?>
                                    <i class="fas fa-check me-2"></i> Selesai
                                <?php else: ?>
                                    Selanjutnya <i class="fas fa-arrow-right ms-2"></i>
                                <?php endif; ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const totalDuration = 1200; // Total durasi tes dalam detik (20 menit)
            const timerKey = "globalTestTimer_<?= $test_id ?>"; // Unik untuk setiap tes berdasarkan test_id
            const timerElement = document.getElementById("timer").children[1];

            let remainingTime;

            // Reset timer jika tes baru dimulai
            if (!sessionStorage.getItem(timerKey)) {
                remainingTime = totalDuration;
                sessionStorage.setItem(timerKey, remainingTime);
            } else {
                remainingTime = parseInt(sessionStorage.getItem(timerKey), 10);
            }

            function updateTimer() {
                if (remainingTime <= 0) {
                    timerElement.textContent = "Waktu Habis!";
                    alert("Waktu habis! Jawaban Anda akan disimpan.");
                    window.location.href = "/test/force_submit/<?= $test_id ?>";
                    return;
                }

                const minutes = Math.floor(remainingTime / 60);
                const seconds = remainingTime % 60;
                timerElement.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;

                remainingTime--;
                sessionStorage.setItem(timerKey, remainingTime);
            }

            let countdownInterval = setInterval(updateTimer, 1000);
            updateTimer();

            // Hentikan interval jika halaman ditutup atau di-refresh
            window.addEventListener("beforeunload", function () {
                clearInterval(countdownInterval);
            });

            // Tangani ketika pengguna menggunakan tombol "Back" browser
            history.pushState(null, null, location.href);
            window.addEventListener("popstate", function () {
                history.pushState(null, null, location.href);
                alert("Anda tidak dapat kembali ke halaman sebelumnya selama tes berlangsung. Tes akan dianggap selesai.");
                clearInterval(countdownInterval);
                sessionStorage.removeItem(timerKey); // Hapus timer lama
                window.location.href = "/test/force_submit/<?= $test_id ?>";
            });

            // Logika navigasi soal
            $(".list-group-item").on("click", function (e) {
                e.preventDefault();

                const target = $(this).data("target");
                const questionId = $(this).data("question");
                const selectedOptionId = $("input[name='selected_option_id']:checked").val();

                if (!selectedOptionId) {
                    // Jika tidak ada jawaban yang dipilih, langsung berpindah
                    window.location.href = "/test/simulate/" + target;
                    return;
                }

                $.post("/test/submit_single", {
                    <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                    selected_option_id: selectedOptionId,
                    question_id: questionId,
                    current: <?= $current ?>,
                    total: <?= $total ?>,
                    test_id: <?= $test_id ?>
                })
                .done(function () {
                    window.location.href = "/test/simulate/" + target;
                })
                .fail(function () {
                    alert("Gagal menyimpan jawaban. Coba lagi.");
                });
            });

            // Logika tombol Submit di halaman terakhir
            $("#questionForm").on("submit", function (e) {
                if (<?= $current ?> >= <?= $total ?>) {
                    e.preventDefault(); // Cegah form agar tidak langsung dikirim
                    const selectedOptionId = $("input[name='selected_option_id']:checked").val();
                    const questionId = $("input[name='question_id']").val();
                    const testId = $("input[name='test_id']").val();

                    if (!selectedOptionId) {
                        alert("Silakan pilih jawaban sebelum menyelesaikan tes.");
                        return;
                    }

                    $.post("/test/submit_test/" + testId, {
                        <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                        selected_option_id: selectedOptionId,
                        question_id: questionId
                    })
                    .done(function () {
                        sessionStorage.removeItem(timerKey); // Hapus timer dari sessionStorage
                        clearInterval(countdownInterval); // Hentikan interval timer
                        window.location.href = "/test/result/" + testId;
                    })
                    .fail(function () {
                        alert("Gagal menyimpan jawaban. Coba lagi.");
                    });
                }
            });
        });
    </script>

</body>
</html>