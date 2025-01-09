<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/latihanHome', 'Home::latihanView');
$routes->get('/testdb', 'TestDB::index');
$routes->get('/users', 'UserController::index');

// Route untuk Sign Up
$routes->get('/signup', 'AuthController::signup');
$routes->post('/register', 'AuthController::register');

// Route untuk Login
$routes->get('/login', 'AuthController::login');
$routes->post('/authenticate', 'AuthController::authenticate');

// Route untuk Logout
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->get('/test/start', 'TestController::start_test', ['filter' => 'auth']);
$routes->get('/test/simulate/(:num)', 'TestController::simulate/$1', ['filter' => 'auth']);
$routes->post('/test/submit_single', 'TestController::submit_single', ['filter' => 'auth']);
$routes->get('/test/result/(:num)', 'TestController::result/$1', ['filter' => 'auth']);
$routes->get('/test/progress', 'TestController::progress', ['filter' => 'auth']);
$routes->get('/test/force_submit/(:num)', 'TestController::force_submit/$1');

$routes->post('/test/submit_test/(:num)', 'TestController::submit_test/$1');
$routes->get('test-env', 'EnvTest::index');

$routes->get('qna', 'QnaController::index');
$routes->post('qna/ask', 'QnaController::ask');

$routes->get('/forum', 'ForumController::index', ['filter' => 'auth']);
$routes->post('/forum/addQuestion', 'ForumController::addQuestion', ['filter' => 'auth']);
$routes->post('/forum/addAnswer/(:num)', 'ForumController::addAnswer/$1', ['filter' => 'auth']);
$routes->get('forum/view/(:num)', 'ForumController::viewQuestion/$1');

$routes->get('/recommendations', 'RecommendationController::recommend_books');

$routes->get('/test/results', 'TestController::all_results');
$routes->get('/api/questions', 'QuestionController::getAllQuestions');

$routes->post('/forum/deleteQuestion/(:num)', 'ForumController::deleteQuestion/$1');
$routes->post('/forum/deleteAnswer/(:num)', 'ForumController::deleteAnswer/$1');

$routes->post('/test/deleteprogress/(:num)', 'TestController::deleteprogress/$1');


// Louis
$routes->get('api/book_formulas', 'BookFormulasController::index'); // Ambil semua data formula
$routes->get('api/book_formulas/book/(:num)', 'BookFormulasController::getByBookId/$1'); // Ambil formula berdasarkan book_id
$routes->get('books', 'Books::index');
$routes->get('books/show/(:num)', 'Books::show/$1');
$routes->get('booksPage', 'Books::viewBooks');
$routes->get('book_formulas', 'BookFormulasController::index');

$routes->get('book_formulas/book/(:num)', 'BookFormulasController::getByBookId/$1'); 
$routes->get('pembahasanSoal', 'pembahasanSoal::index'); // Halaman pembahasan soal

$routes->get('/authlouis/login', 'AuthLouis::login');
$routes->post('/authlouis/loginProcess', 'AuthLouis::loginProcess');
$routes->get('/authlouis/signup', 'AuthLouis::signup');
$routes->post('/authlouis/signupProcess', 'AuthLouis::signupProcess');
$routes->get('/authlouis/logout', 'AuthLouis::logout');

$routes->get('/louisdashboard.php', 'LouisDashboard::index');
$routes->post('/books/addReview', 'Books::addReview');



