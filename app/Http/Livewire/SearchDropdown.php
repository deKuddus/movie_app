<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component {
    public $search = '';
    public function render() {
        $searchMovies = [];
        if (strlen($this->search) >= 2) {
            $searchMovies = Http::get('https://api.themoviedb.org/3/search/movie?api_key=f14092884639d7b4dc5fb2691bb23f13&query=' . $this->search)
                ->json()['results'];
        }
        return view('livewire.search-dropdown', compact('searchMovies'));
    }
}
