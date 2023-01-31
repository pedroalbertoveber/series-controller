<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Series::with(['seasons'])->get();
        $message = $request->session()->get('message.success');

        return view('series.index', compact(['series', 'message']));
    }

    public function create() {
        return view('series.create');
    }
    
    public function store(SeriesFormRequest $request) {
        $series = DB::transaction(function () use ($request) {
            $series = Series::create($request->all());
            $seasons = [];
    
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $series->id,
                    'number' => $i,
                ];
            }
    
            Season::insert($seasons);
    
            $episodes = [];
            foreach ($series->seasons as $season) {
                for ($j = 1; $j <= $request->epsodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            Episode::insert($episodes);

            return $series;
        });


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
