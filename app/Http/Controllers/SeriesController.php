<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index() {
        $series = [
            'Supernatural',
            'Breaking Bad',
            'House',
        ];

        return view('series.index', compact('series'));
    }
    
}
