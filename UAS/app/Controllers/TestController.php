<?php

namespace App\Controllers;

use App\Models\QuestionModel;
use App\Models\TestModel;
use App\Models\TestAnswerModel;
use App\Models\OptionModel;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TestController extends Controller
{
    protected $questionModel;
    protected $testModel;
    protected $testAnswerModel;
    protected $optionModel;

    public function __construct()
    {
        $this->questionModel = new QuestionModel();
        $this->testModel = new TestModel();
        $this->testAnswerModel = new TestAnswerModel();
        $this->optionModel = new OptionModel();
        $this->jwtKey = env('JWT_SECRET');
        // Memuat helper yang diperlukan
        helper(['url', 'form']);
    }

     /**
     * Validasi token JWT
     */
    // private function validateToken()
    // {
    //     $authHeader = $this->request->getHeaderLine('Authorization');
    //     $token = str_replace('Bearer ', '', $authHeader);

    //     try {
    //         $decoded = JWT::decode($token, new Key($this->key, 'HS256'));
    //         return $decoded->data; // data user dari jwt
    //     } catch (\Exception $e) {
    //         return false;
    //     }
    // }
    
    /**
     * Memulai tes baru
     */
    public function start_test()
    {

        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        $session = session();
        $user = $session->get('user');
        
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        // Reset remaining_time ke 1200 detik (20 menit)
        // $remainingTime = 1200;
    
        // Membuat entri baru di tabel tests
        $testId = $this->testModel->insert([
            'user_id'        => $user->user_id,
            'score'          => 0,
            // 'remaining_time' => $remainingTime,
            'start_time'     => date('Y-m-d H:i:s')
        ]);
    
        // Reset session untuk tes baru
        $session->set('test_id', $testId);
        // $session->set('remaining_time', $remainingTime);
    
        // Arahkan ke soal pertama
        return redirect()->to('/test/simulate/1');
    }

    /**
     * Menampilkan soal berdasarkan nomor
     *
     * @param int $questionNumber
     */
    public function simulate($questionNumber)
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        $session = session();
        $testId = $session->get('test_id');

        if (!$testId) {
            return redirect()->to('/test/start')->with('error', 'Tes tidak ditemukan.');
        }

        $test = $this->testModel->find($testId);
        if (!$test) {
            return redirect()->to('/test/start')->with('error', 'Tes tidak ditemukan.');
        }

        $question = $this->questionModel->getQuestionWithOptions($questionNumber);
        if (!$question) {
            return redirect()->to('/test/progress')->with('error', 'Soal tidak ditemukan.');
        }

        $options = $this->optionModel->getOptionsByQuestionId($question['id']);
        $total = $this->questionModel->countAll();
        $answered = $this->testAnswerModel->getAnsweredQuestions($testId);
        $existingAnswer = $this->testAnswerModel->where([
            'test_id' => $testId,
            'question_id' => $question['id']
        ])->first();

        // Perbaiki Remaining Time
        // $remainingTime = $session->get('remaining_time') ?? 1200; 

        // Kirim data ke view
        return view('tests/simulate', [
            'current' => $questionNumber,
            'total' => $total,
            'question' => $question,
            'options' => $options,
            'answered' => $answered,
            'selectedOption' => $existingAnswer['selected_option_id'] ?? null,
            'test_id' => $testId
            // 'remainingTime' => $remainingTime
        ]);
    }



    public function force_submit($testId)
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Pastikan test_id valid dan milik user saat ini
        $test = $this->testModel->find($testId);
        if (!$test || $test['user_id'] != $user->user_id) {
            return redirect()->to('/test/start')->with('error', 'Tes tidak ditemukan atau Anda tidak berhak mengaksesnya.');
        }

        // Hitung skor berdasarkan jawaban yang benar
        $testAnswers = $this->testAnswerModel->getAnswersByTestId($testId);
        $score = 0;

        foreach ($testAnswers as $answer) {
            if ($answer['is_correct'] == 1) {
                $score++;
            }
        }

        // Update skor di database
        $this->testModel->update($testId, [
            'score' => $score,
            // 'remaining_time' => 0 // Waktu habis
        ]);
        // $session->remove('remaining_time');
        // Redirect ke halaman hasil tes
        return redirect()->to('/test/result/' . $testId);
    }

    public function submit_test($testId)
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Pastikan test_id valid dan milik user saat ini
        $test = $this->testModel->find($testId);
        if (!$test || $test['user_id'] != $user->user_id) {
            return redirect()->to('/test/start')->with('error', 'Tes tidak ditemukan atau Anda tidak berhak mengaksesnya.');
        }

        // Simpan jawaban terakhir jika ada
        $selectedOptionId = $this->request->getPost('selected_option_id');
        $questionId = $this->request->getPost('question_id');

        if ($selectedOptionId && $questionId) {
            $existingAnswer = $this->testAnswerModel->where([
                'test_id' => $testId,
                'question_id' => $questionId
            ])->first();

            $correctOption = $this->optionModel->where('question_id', $questionId)
                                            ->where('is_correct', 1)
                                            ->first();

            $isCorrect = ($correctOption && $correctOption['id'] == $selectedOptionId) ? 1 : 0;

            if ($existingAnswer) {
                // Update jawaban terakhir jika sudah ada
                $this->testAnswerModel->update($existingAnswer['id'], [
                    'selected_option_id' => $selectedOptionId,
                    'is_correct' => $isCorrect
                ]);
            } else {
                // Tambahkan jawaban terakhir
                $this->testAnswerModel->insert([
                    'test_id' => $testId,
                    'question_id' => $questionId,
                    'selected_option_id' => $selectedOptionId,
                    'is_correct' => $isCorrect
                ]);
            }
        }

        // Hitung skor berdasarkan jawaban yang benar
        $testAnswers = $this->testAnswerModel->getAnswersByTestId($testId);
        $score = 0;

        foreach ($testAnswers as $answer) {
            if ($answer['is_correct'] == 1) {
                $score++;
            }
        }

        // Update skor di database
        $this->testModel->update($testId, [
            'score' => $score,
            // 'remaining_time' => 0 // Waktu habis
        ]);
        // $session->remove('remaining_time');

        // Redirect ke halaman hasil
        $session->setFlashdata('test_finished', true);
        return redirect()->to('/test/result/' . $testId);
    }


    public function submit_single()
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        // Validasi input
        if (!$this->validate([
            'selected_option_id' => 'required|integer',
            'question_id' => 'required|integer',
            'current' => 'required|integer',
            'total' => 'required|integer',
            'test_id' => 'required|integer'
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Mendapatkan data dari form
        $selectedOptionId = $this->request->getPost('selected_option_id');
        $questionId = $this->request->getPost('question_id');
        $current = (int)$this->request->getPost('current');
        $total = (int)$this->request->getPost('total');
        $testId = (int)$this->request->getPost('test_id');

        // Mendapatkan user dari session
        $session = session();

        // Cek apakah jawaban benar
        $correctOption = $this->optionModel->where('question_id', $questionId)
                                        ->where('is_correct', 1)
                                        ->first();

        $isCorrect = ($correctOption && $correctOption['id'] == $selectedOptionId) ? 1 : 0;

        // Simpan jawaban ke database
        $existingAnswer = $this->testAnswerModel->where([
            'test_id' => $testId,
            'question_id' => $questionId
        ])->first();

        if ($existingAnswer) {
            // Update jawaban jika sudah ada
            $this->testAnswerModel->update($existingAnswer['id'], [
                'selected_option_id' => $selectedOptionId,
                'is_correct' => $isCorrect
            ]);
        } else {
            // Tambahkan jawaban baru
            $this->testAnswerModel->insert([
                'test_id' => $testId,
                'question_id' => $questionId,
                'selected_option_id' => $selectedOptionId,
                'is_correct' => $isCorrect
            ]);
        }

        // Jika soal terakhir, redirect ke tombol submit
        if ($current >= $total) {
            return redirect()->to('/test/submit/' . $testId);
        }

        // Arahkan ke soal berikutnya
        return redirect()->to('/test/simulate/' . ($current + 1));
    }


    /**
     * Menampilkan hasil tes
     *
     * @param int $testId
     */
    public function result($testId)
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }

        $session = session();
        $user = $session->get('user');
    
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    
        // Pastikan test_id valid dan milik user saat ini
        $test = $this->testModel->find($testId);
        if (!$test || $test['user_id'] != $user->user_id) {
            return redirect()->to('/test/start')->with('error', 'Tes tidak ditemukan atau Anda tidak berhak mengaksesnya.');
        }
    
        // Ambil semua jawaban untuk tes ini
        $testAnswers = $this->testAnswerModel->getAnswersByTestId($testId);
    
        // Ambil informasi terperinci untuk setiap jawaban
        $detailedAnswers = [];
        foreach ($testAnswers as $answer) {
            $question = $this->questionModel->find($answer['question_id']);
            $selectedOption = $this->optionModel->find($answer['selected_option_id']);
            $correctOption = $this->optionModel->where('question_id', $answer['question_id'])->where('is_correct', 1)->first();
    
            $detailedAnswers[] = [
                'question_text' => $question['question_text'],
                'selected_option' => $selectedOption ? $selectedOption['option_text'] : null,
                'is_correct' => $answer['is_correct'],
                'correct_option' => $correctOption ? $correctOption['option_text'] : null
            ];
        }
    
        // Memuat view dengan data hasil
        return view('tests/result', [
            'test' => $test,
            'testAnswers' => $detailedAnswers,
            'score' => $test['score'],
            'total' => count($detailedAnswers)
        ]);
    }
    
    public function all_results()
    {
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(401);
        }

        // Ambil semua tes pengguna
        $tests = $this->testModel->where('user_id', $user->user_id)->findAll();

        if (empty($tests)) {
            return $this->response->setJSON(['message' => 'No tests found'])->setStatusCode(404);
        }

        $allResults = [];

        foreach ($tests as $test) {
            // Ambil semua jawaban untuk tes ini
            $testAnswers = $this->testAnswerModel->getAnswersByTestId($test['id']);

            // Ambil detail setiap jawaban
            $detailedAnswers = [];
            foreach ($testAnswers as $answer) {
                $question = $this->questionModel->getQuestionDetails($answer['question_id']);
                $selectedOption = $this->optionModel->find($answer['selected_option_id']);
                $correctOption = $this->optionModel
                    ->where('question_id', $answer['question_id'])
                    ->where('is_correct', 1)
                    ->first();

                $detailedAnswers[] = [
                    'question_text' => $question['question_text'],
                    'topic_covered' => $question['topic_covered'],
                    'question_type' => $question['question_type'],
                    'selected_option' => $selectedOption ? $selectedOption['option_text'] : null,
                    'is_correct' => $answer['is_correct'],
                    'correct_option' => $correctOption ? $correctOption['option_text'] : null
                ];
            }

            // Tambahkan hasil tes ke array
            $allResults[] = [
                'test' => $test,
                'answers' => $detailedAnswers,
                'score' => $test['score'],
                'total_questions' => count($detailedAnswers)
            ];
        }

        return $this->response->setJSON($allResults);
    }

    // Menampilkan progress pengguna
    public function progress()
    {
        // $user = $this->validateToken();
        // if (!$user) {
        //     return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Unauthorized']);
        // }
        
        $session = session();
        $user = $session->get('user');

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Mendapatkan semua tes yang diambil oleh user
        $tests = $this->testModel->where('user_id', $user->user_id)->findAll();

        // Mendapatkan total jumlah soal (dari tabel questions)
        $total = $this->questionModel->countAll();

        return view('tests/progress', [
            'tests' => $tests,
            'total' => $total
        ]);
    }
}
