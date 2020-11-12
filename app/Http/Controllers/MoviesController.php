<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModels;
use App\ViewModels\MovieViewModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $popularMovies    = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=f14092884639d7b4dc5fb2691bb23f13')->json()['results'];
        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json()['results'];
        $genere = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json()['genres'];

        $viewModels = new MoviesViewModels(
            $popularMovies, $nowPlayingMovies, $genere);
        return view('movies.index', $viewModels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $movie_single = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=f14092884639d7b4dc5fb2691bb23f13&append_to_response=credits,videos')
            ->json();
        $movieModel = new MovieViewModels($movie_single);
        return view('movies.show', $movieModel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
