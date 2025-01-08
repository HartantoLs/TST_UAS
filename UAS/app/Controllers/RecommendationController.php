<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RecommendationController extends Controller
{
    public function recommend_books()
    {
        // Cukup menampilkan view
        return view('recommendations');
    }
}
