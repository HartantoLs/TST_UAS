<?php

namespace App\Models;

use CodeIgniter\Model;

class BookFormulasModel extends Model
{
    protected $DBGroup = 'secondary'; 
    protected $table = 'book_formulas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'formula', 'topic_covered'];
}
