<?php

namespace App\Http\Controllers;

use App\ViewModels\TvShowsViewModels;
use App\ViewModels\TvShowViewModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $popularTv = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=f14092884639d7b4dc5fb2691bb23f13')->json()['results'];
        $topRated  = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json()['results'];
        $genere = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json()['genres'];
/*        var_dump($popularTv);exit();*/
        $viewModels = new TvShowsViewModels(
            $popularTv, $topRated, $genere);

        return view('tv.index', $viewModels);
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
        $tvShow = Http::get('https://api.themoviedb.org/3/tv/' . $id . '?api_key=f14092884639d7b4dc5fb2691bb23f13&append_to_response=credits,videos')
            ->json();
        $movieModel = new TvShowViewModels($tvShow);
        return view('tv.show', $movieModel);
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
