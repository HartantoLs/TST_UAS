<?php
namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'rating', 'review', 'created_at', 'updated_at'];

    public function getReviewsByBookId($book_id)
    {
        return $this->where('book_id', $book_id)->findAll();
    }
}
