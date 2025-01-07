<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QnA Chatbot Gemini</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>QnA Chatbot Gemini</h1>
    <form id="qnaForm">
        <label for="question">Tanyakan sesuatu:</label>
        <input type="text" id="question" name="question" placeholder="Masukkan pertanyaan Anda" required>
        <button type="submit">Kirim</button>
    </form>
    <div id="response">
        <h2>Jawaban:</h2>
        <p id="answer"></p>
    </div>

    <script>
        document.getElementById('qnaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const questionInput = document.getElementById('question');
            const question = questionInput.value.trim();

            if (!question) {
                document.getElementById('answer').textContent = 'Harap masukkan pertanyaan sebelum mengirim.';
                return;
            }

            axios.post('/qna/ask', { question })
                .then(response => {
                    if (response.data && response.data.answer) {
                        document.getElementById('answer').textContent = response.data.answer;
                    } else {
                        document.getElementById('answer').textContent = 'Tidak ada jawaban yang diterima dari server.';
                    }
                })
                .catch(error => {
                    const errorMessage = error.response && error.response.data && error.response.data.error 
                        ? error.response.data.error 
                        : 'Terjadi kesalahan saat menghubungi server.';
                    document.getElementById('answer').textContent = 'Error: ' + errorMessage;
                });
        });
    </script>
</body>
</html>
