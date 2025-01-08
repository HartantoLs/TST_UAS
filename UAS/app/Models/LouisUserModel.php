<?php

namespace App\Models;

use CodeIgniter\Model;

class LouisUserModel extends Model
{
    protected $DBGroup = 'secondary'; 
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'created_at', 'updated_at'];
    protected $useTimestamps = false;
}
