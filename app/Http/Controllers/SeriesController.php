<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::all();
        $message = $request->session()->get('message.success');

        return view('series.index', compact(['series', 'message']));
    }

    public function create() {
        return view('series.create');
    }
    
    public function store(Request $request) {
        
        $serie = Serie::create($request->all());

        return to_route('series.index')
        ->with('message.success', "A série '{$serie->name}' foi adicionada com sucesso!");
    }

    public function edit(Serie $series) {
        return view('series.edit')->with('series', $series);
    }

    public function update(Serie $series, Request $request){
        $series->update($request->all());

        return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' Atualizada com sucesso!");
    }

    public function destroy(Serie $series) {

        $series->delete();

        return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' removida com sucesso!");
    }
}
