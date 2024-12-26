<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Tes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .answered {
            background-color: #d4edda;
        }
        .active {
            background-color: #cce5ff;
        }
        #timer {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
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
                            Soal <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            </div>

            <!-- Soal -->
            <div class="col-md-9">
                <h1>Soal <?= $current ?> dari <?= $total ?></h1>
                <p><?= esc($question['question_text']) ?></p>
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

                    <div class="d-flex justify-content-between mt-3">
                        <?php if ($current > 1): ?>
                            <a href="/test/simulate/<?= $current - 1 ?>" class="btn btn-secondary">Sebelumnya</a>
                        <?php else: ?>
                            <span></span> <!-- Placeholder untuk menjaga tata letak -->
                        <?php endif; ?>
                        <button type="submit" class="btn btn-<?= $current >= $total ? 'success' : 'primary' ?>">
                            <?= $current >= $total ? 'Submit' : 'Selanjutnya' ?>
                        </button>
                    </div>
                </form>
                <div id="timer">Waktu: 20:00</div>
            </div>
        </div>
    </div>

    <!-- Timer -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const totalDuration = 1200; // Total waktu pengerjaan dalam detik (20 menit)
            const timerKey = "globalTestTimer"; // Kunci untuk menyimpan waktu di sessionStorage
            const timerElement = document.getElementById("timer");

            let remainingTime;

            // Ambil waktu dari sessionStorage jika ada
            if (sessionStorage.getItem(timerKey)) {
                remainingTime = parseInt(sessionStorage.getItem(timerKey), 10);
            } else {    
                // Inisialisasi waktu jika belum ada
                remainingTime = totalDuration;
                sessionStorage.setItem(timerKey, remainingTime);
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

                remainingTime--; // Kurangi waktu
                sessionStorage.setItem(timerKey, remainingTime); // Simpan ke sessionStorage
            }

            let countdownInterval = setInterval(updateTimer, 1000);
            updateTimer();

            // Hentikan timer jika tes selesai
            window.addEventListener("beforeunload", function () {
                clearInterval(countdownInterval);
            });

            // Logika khusus untuk Sidebar di halaman terakhir
            $(".list-group-item").on("click", function (e) {
                e.preventDefault();

                const target = $(this).data("target");
                const questionId = $(this).data("question");
                const selectedOptionId = $("input[name='selected_option_id']:checked").val();
                const testId = <?= $test_id ?>;

                if (!selectedOptionId) {
                    // Jika tidak ada jawaban yang dipilih, langsung berpindah
                    window.location.href = "/test/simulate/" + target;
                    return;
                }

                // Jika berada di halaman terakhir, kirim jawaban terakhir dengan AJAX
                if (<?= $current ?> >= <?= $total ?>) {
                    $.post("/test/submit_single", {
                        <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                        selected_option_id: selectedOptionId,
                        question_id: questionId,
                        current: <?= $current ?>,
                        total: <?= $total ?>,
                        test_id: testId
                    })
                    .done(function () {
                        // Setelah jawaban tersimpan, pindah ke halaman yang diinginkan
                        window.location.href = "/test/simulate/" + target;
                    })
                    .fail(function () {
                        alert("Gagal menyimpan jawaban. Coba lagi.");
                    });
                } else {
                    // Logika untuk halaman biasa
                    $.post("/test/submit_single", {
                        <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                        selected_option_id: selectedOptionId,
                        question_id: questionId,
                        current: <?= $current ?>,
                        total: <?= $total ?>,
                        test_id: testId
                    })
                    .done(function () {
                        // Setelah jawaban tersimpan, pindah ke halaman yang diinginkan
                        window.location.href = "/test/simulate/" + target;
                    })
                    .fail(function () {
                        alert("Gagal menyimpan jawaban. Coba lagi.");
                    });
                }
            });

            // Logika tombol Submit
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

                    // Kirim jawaban terakhir dengan AJAX
                    $.post("/test/submit_test/" + testId, {
                        <?= csrf_token() ?>: "<?= csrf_hash() ?>",
                        selected_option_id: selectedOptionId,
                        question_id: questionId
                    })
                    .done(function () {
                        // Setelah jawaban tersimpan, redirect ke halaman hasil
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
