<?php

namespace App\Controllers;

use App\Models\BookFormulasModel;
use CodeIgniter\RESTful\ResourceController;

class BookFormulasController extends ResourceController
{
    protected $bookFormulasModel;

    public function __construct()
    {
        $this->bookFormulasModel = new BookFormulasModel();
    }

    /**
     * Mengambil semua data dari tabel book_formulas dan mengembalikannya dalam format JSON
     */
    public function index()
    {
        try {
            $formulas = $this->bookFormulasModel->findAll();
            return $this->respond($formulas, 200);
        } catch (\Exception $e) {
            return $this->failServerError('Gagal mengambil data formula');
        }
    }

    /**
     * Mengambil data formula berdasarkan book_id
     * @param int $book_id
     */
    public function getByBookId($book_id)
    {
        try {
            $formulas = $this->bookFormulasModel->where('book_id', $book_id)->findAll();
            if (!$formulas) {
                return $this->failNotFound("Tidak ada formula untuk book_id: $book_id");
            }
            return $this->respond($formulas, 200);
        } catch (\Exception $e) {
            return $this->failServerError('Gagal mengambil data formula berdasarkan book_id');
        }
    }
}
