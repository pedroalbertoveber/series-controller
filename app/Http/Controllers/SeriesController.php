<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticator;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Authenticator::class)->except('index');
    }

    public function index(Request $request) {

        $series = Series::with(['seasons'])->get();
        $message = $request->session()->get('message.success');

        return view('series.index', compact(['series', 'message']));
    }

    public function create() {
        return view('series.create');
    }
    
    public function store(SeriesFormRequest $request) {

        $series = $this->repository->add($request);

        return to_route('series.index')
        ->with('message.success', "A série '{$series->name}' foi adicionada com sucesso!");
    }

    public function edit(Series $series) {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request){
        $series->update($request->all());

        return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' Atualizada com sucesso!");
    }

    public function destroy(Series $series) {

        $series->delete();

        return to_route('series.index')
            ->with('message.success', "Série '{$series->name}' removida com sucesso!");
    }
}
