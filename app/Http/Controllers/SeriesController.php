<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index() {
        $series = Serie::all();

        return view('series.index', compact('series'));
    }

    public function create() {
        return view('series.create');
    }
    
    public function store(Request $request) {
        $name = $request->input('name');
        $serie = new Serie();

        $serie->name = $name;
        $serie->save();

        return redirect('/series');
    }
}
