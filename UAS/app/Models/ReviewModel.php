<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $DBGroup = 'secondary'; 
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'user_id', 'rating', 'review', 'created_at', 'updated_at'];
    protected $useTimestamps = true;

    public function getReviewsByBookId($bookId)
    {
        return $this->where('book_id', $bookId)->findAll();
    }

    public function getAverageRatingByBookId($bookId)
    {
        return $this->select('AVG(rating) as avg_rating')
            ->where('book_id', $bookId)
            ->first();
    }
}
