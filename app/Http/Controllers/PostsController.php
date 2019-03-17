<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index() 
    {

        $people = [
            'Edwin',
            'Peter',
            'Maria',
        ];

        return view('contact', ['people' => $people]);
    }
}
