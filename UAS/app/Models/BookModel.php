<?php
namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'description', 'link', 'published_at', 'created_at', 'updated_at'];

    protected $DBGroup = 'secondary'; 

    public function getAllBooksWithRating()
    {
        $builder = $this->db->table($this->table);
        $builder->select('books.*, COALESCE(AVG(reviews.rating), 0) AS average_rating');
        $builder->join('reviews', 'books.id = reviews.book_id', 'left');
        $builder->groupBy('books.id');
        return $builder->get()->getResultArray();
    }

    public function getBookById($id)
    {
        return $this->find($id);
    }
}
