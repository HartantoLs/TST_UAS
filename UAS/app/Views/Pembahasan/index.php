<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembahasan Soal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="mb-3">
            <a href="/louisdashboard.php" class="btn btn-secondary btn-sm">&larr; Back</a>
    </div>
    <div class="container my-4">
        <!-- Bagian Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Pembahasan Soal</h1>
            <div>
                <?php if (session()->get('username')): ?>
                    <p class="mb-0">Halo, <strong><?= session()->get('username'); ?></strong>!</p>
                    <a href="/authlouis/logout" class="btn btn-danger btn-sm">Logout</a>
                <?php else: ?>
                    <p class="mb-0"><a href="/authlouis/login" class="btn btn-primary btn-sm">Login</a> untuk melihat pembahasan.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Kontainer Pembahasan -->
        <div id="discussion-container">
            <p class="text-center">Memuat pembahasan...</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", async () => {
            const discussionContainer = document.getElementById('discussion-container');

            try {
                // Fetch data dari API questions dan formulas
                const [questionsResponse, formulasResponse] = await Promise.all([
                    fetch('/api/questions'),
                    fetch('/api/book_formulas') // Endpoint formulas tetap sama
                ]);

                if (!questionsResponse.ok || !formulasResponse.ok) {
                    throw new Error("Gagal mengambil data dari server.");
                }

                const questionsData = await questionsResponse.json();
                const formulasData = await formulasResponse.json();

                // Untuk melacak soal yang sudah ditampilkan
                const displayedQuestions = new Set();

                // Generate pembahasan
                let discussionHTML = '';

                questionsData.forEach(question => {
                    // Hindari menampilkan soal yang sama lebih dari sekali
                    if (displayedQuestions.has(question.question_text)) return;
                    displayedQuestions.add(question.question_text);

                    // Cari formula yang cocok berdasarkan topic_covered
                    const matchedFormulas = formulasData.filter(formula =>
                        formula.topic_covered.toLowerCase().includes(question.question_type.toLowerCase())
                    );

                    // Buat HTML untuk soal dan pembahasannya
                    discussionHTML += `
                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5>Soal: ${question.question_text}</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Topik:</strong> ${question.topic_covered}</p>
                                <h6>Rumus yang Relevan:</h6>
                                ${matchedFormulas.length > 0
                                    ? `<ul>${matchedFormulas.map(formula => `
                                        <li><strong>${formula.formula}</strong> (Topik: ${formula.topic_covered})</li>
                                    `).join('')}</ul>`
                                    : `<p class="text-muted">Tidak ada rumus yang relevan untuk soal ini.</p>`
                                }
                            </div>
                        </div>
                    `;
                });

                // Tampilkan hasil pembahasan
                discussionContainer.innerHTML = discussionHTML || '<p class="text-center text-muted">Tidak ada pembahasan tersedia.</p>';

            } catch (error) {
                discussionContainer.innerHTML = `<p class="text-center text-danger">Error: ${error.message}</p>`;
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
