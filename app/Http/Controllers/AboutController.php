<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('apropos'); // Assurez-vous que le fichier blade est nommé apropos.blade.php
    }
}

