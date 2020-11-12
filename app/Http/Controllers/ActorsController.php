<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorViewModel;
use App\ViewModels\PopularActorsViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1) {
        $popularActors = Http::get('https://api.themoviedb.org/3/person/popular?api_key=f14092884639d7b4dc5fb2691bb23f13&&page=' . $page)->json()['results'];

        $viewModel = new PopularActorsViewModel($popularActors, $page);
        return view('actors.index', $viewModel);
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
        $actor = Http::get('https://api.themoviedb.org/3/person/' . $id . '?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json();
        $social = Http::get('https://api.themoviedb.org/3/person/' . $id . '/external_ids/?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json();
        $credits = Http::get('https://api.themoviedb.org/3/person/' . $id . '/combined_credits?api_key=f14092884639d7b4dc5fb2691bb23f13')
            ->json();
        $viewModel = new ActorViewModel($actor, $social, $credits);
        return view('actors.show', $viewModel);
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
