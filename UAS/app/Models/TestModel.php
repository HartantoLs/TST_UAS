<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'tests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'score', 'start_time', 'end_time', 'created_at', 'updated_at'];

    // Mengambil semua tes oleh pengguna
    public function getTestsByUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
