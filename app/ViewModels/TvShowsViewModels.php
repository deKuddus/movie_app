<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowsViewModels extends ViewModel {
    public $popularTv;
    public $topRated;
    public $genere;
    public function __construct($popularTv, $topRated, $genere) {
        $this->popularTv = $popularTv;
        $this->topRated  = $topRated;
        $this->genere    = $genere;
    }

    public function popularTv() {
        return $this->formatTvShow($this->popularTv);
    }

    public function topRated() {
        return $this->formatTvShow($this->topRated);
    }
    public function genere() {
        return $genere = collect($this->genere)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTvShow($tv) {
        return collect($tv)->map(function ($tvShow) {
            $genereFormated = collect($tvShow['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genere()->get($value)];
            })->implode(', ');
            return collect($tvShow)->merge([
                'poster_path'    => 'https://image.tmdb.org/t/p/w500/' . $tvShow['poster_path'],
                'vote_average'   => ($tvShow['vote_average'] * 10) . '%',
                'first_air_date' => Carbon::parse($tvShow['first_air_date'])->format('M d, Y'),
                'genres'         => $genereFormated,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'name', 'vote_average', 'overview', 'first_air_date', 'genres',
            ]);
        });
    }
}
