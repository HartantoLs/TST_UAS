<?php
namespace App\Controllers;

use App\Models\BookModel;
use App\Models\ReviewModel;

class Books extends BaseController
{
    protected $bookModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();
        $this->reviewModel = new ReviewModel();
    }

    public function index()
    {
        $books = $this->bookModel->getAllBooksWithRating();
        return $this->response->setJSON($books); // Mengembalikan data dalam format JSON
    }

    public function show($id)
    {
        $book = $this->bookModel->getBookById($id);
        $reviews = $this->reviewModel->getReviewsByBookId($id);

        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        return view('books/show', [
            'book' => $book,
            'reviews' => $reviews,
        ]);
    }


    public function viewBooks()
    {
        // Fetch books data from the model
        $books = $this->bookModel->getAllBooksWithRating();

        // Pass the data to the view
        return view('books/index', ['books' => $books]);
    }


}
