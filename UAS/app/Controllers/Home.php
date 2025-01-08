<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function latihanView(): string
    {
        return view('latihanHome');
    }
}
