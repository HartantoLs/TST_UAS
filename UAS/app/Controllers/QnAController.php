<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class QnaController extends Controller
{
    private $chatbotApiUrl;
    private $chatbotApiKey;

    public function __construct()
    {
        // Ambil konfigurasi API dari file .env
        $this->chatbotApiUrl = getenv('CHATBOT_API_URL');
        $this->chatbotApiKey = getenv('CHATBOT_API_KEY');
        if (!$this->chatbotApiKey) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'API Key tidak ditemukan. Pastikan variabel GOOGLE_API_KEY ada di file .env.',
            ]);
        }
    }

    public function index()
    {
        // Tampilkan halaman QnA
        return view('qna');
    }

    public function ask()
    {
        $input = $this->request->getJSON();
        
        // Log input untuk debugging
        log_message('debug', 'Input: ' . json_encode($input));
    
        // Memeriksa apakah 'question' ada dalam data yang diterima
        if (!isset($input->question) || empty($input->question)) {
            return $this->response->setJSON(['error' => 'Pertanyaan tidak boleh kosong'])
                                  ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }
    
        $question = $input->question;
    
        try {
            // Kirim permintaan ke API chatbot
            $response = $this->callChatbotApi($question);
    
            return $this->response->setJSON([
                'question' => $question,
                'answer' => $response,
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error saat memanggil API: ' . $e->getMessage());
    
            return $this->response->setJSON([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    

    private function callChatbotApi($question)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->post($this->chatbotApiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->chatbotApiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'question' => $question,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new Exception('Chatbot API mengembalikan status: ' . $response->getStatusCode());
        }

        $data = json_decode($response->getBody(), true);

        return $data['answer'] ?? 'Tidak ada jawaban yang tersedia';
    }
}
