<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function welcome()
    {
        return view('welcome');
    }
}
