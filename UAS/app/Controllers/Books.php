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

        if (!$book) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Book not found');
        }

        // Hitung rata-rata rating
        $averageRating = $this->reviewModel->select('AVG(rating) as average_rating')
                                        ->where('book_id', $id)
                                        ->first()['average_rating'];

        $book['average_rating'] = $averageRating ? round($averageRating, 1) : 0;

        $reviews = $this->reviewModel->select('reviews.*, users.name as reviewer_name')
                                    ->join('users', 'reviews.user_id = users.id')
                                    ->where('reviews.book_id', $id)
                                    ->findAll();

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

    /**
     * Menambahkan review untuk buku
     */
    public function addReview()
    {
        if (!session()->get('id')) {
            return redirect()->to('/authlouis/login')->with('error', 'You need to log in to add a review.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'book_id' => 'required|integer',
            'rating' => 'required|integer|greater_than[0]|less_than_equal_to[5]',
            'review' => 'required|max_length[500]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $data = [
            'book_id' => $this->request->getPost('book_id'),
            'user_id' => session()->get('id'),
            'rating' => $this->request->getPost('rating'),
            'review' => $this->request->getPost('review'),
        ];

        $this->reviewModel->insert($data);

        return redirect()->to('/books/show/' . $this->request->getPost('book_id'))->with('message', 'Review and rating added successfully.');
    }

    

}
