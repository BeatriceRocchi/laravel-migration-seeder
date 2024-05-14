<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function trainsList()
    {
        $trains = Train::all();
        return view('trains-list', compact('trains'));
    }
}
