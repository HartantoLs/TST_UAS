<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Contoh data soal dan opsi
        $questions = [
            [
                'question_text' => 'Jika \( f(x) = 2x + 3 \), maka \( f^{-1}(x) \) adalah fungsi yang menghasilkan:',
                'options' => [
                    ['option_text' => 'x = (y - 3)/2', 'is_correct' => true],
                    ['option_text' => 'x = 2y + 3', 'is_correct' => false],
                    ['option_text' => 'x = (y + 3)/2', 'is_correct' => false],
                    ['option_text' => 'x = 2/(y - 3)', 'is_correct' => false],
                    ['option_text' => 'x = (2y - 3)', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Manakah dari pernyataan berikut yang benar tentang bilangan prima?',
                'options' => [
                    ['option_text' => 'Bilangan prima hanya habis dibagi 1 dan dirinya sendiri.', 'is_correct' => true],
                    ['option_text' => 'Bilangan 1 adalah bilangan prima.', 'is_correct' => false],
                    ['option_text' => 'Semua bilangan genap adalah bilangan prima.', 'is_correct' => false],
                    ['option_text' => 'Bilangan prima selalu ganjil.', 'is_correct' => false],
                    ['option_text' => 'Bilangan prima terbesar adalah tak terhingga.', 'is_correct' => false],
                ],
            ],
            // Tambahkan lebih banyak soal sesuai kebutuhan
        ];

        foreach ($questions as $q) {
            // Insert soal ke tabel `questions`
            $this->db->table('questions')->insert([
                'question_text' => $q['question_text']
            ]);

            $questionId = $this->db->insertID();

            // Insert pilihan jawaban ke tabel `options`
            foreach ($q['options'] as $opt) {
                $this->db->table('options')->insert([
                    'question_id' => $questionId,
                    'option_text' => $opt['option_text'],
                    'is_correct' => $opt['is_correct']
                ]);
            }
        }

        echo "Seeder berhasil dijalankan.\n";
    }
}
