<?php

namespace App\Controllers;

class EnvTest extends BaseController
{
    public function index()
    {
        echo getenv('DATABASE_URL');
    }
}
