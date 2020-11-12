<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModels extends ViewModel {
    public $popularMovies;
    public $nowPlayingMovies;
    public $genere;
    public function __construct($popularMovies, $nowPlayingMovies, $genere) {
        $this->popularMovies    = $popularMovies;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genere           = $genere;
    }

    public function popularMovies() {
        return $this->formatMovies($this->popularMovies);
    }

    public function nowPlayingMovies() {
        return $this->formatMovies($this->nowPlayingMovies);
    }
    public function genere() {
        return $genere = collect($this->genere)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($movies) {
        return collect($movies)->map(function ($movie) {
            $genereFormated = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genere()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path'  => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                'vote_average' => ($movie['vote_average'] * 10) . '%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres'       => $genereFormated,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
    }
}
