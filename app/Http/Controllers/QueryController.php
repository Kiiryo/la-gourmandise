<?php

namespace App\Http\Controllers;

use App\Models\Recette;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class QueryController extends Controller
{
    public function search(Request $request)
    {

        $recettes = Recette::all();
        // Gets the query string from our form submission
        $query = Request::input('search');
        // Returns an array of articles that have the query string located somewhere within
        // our articles titles. Paginates them so we can break up lots of search results.
        $recettesfound = DB::table('recettes')->where('title', 'LIKE', '%' . $query . '%')->orwhere('username', 'LIKE', '%' . $query . '%')->orwhere('description', 'LIKE', '%' . $query . '%')->paginate(10);

        // returns a view and passes the view the list of articles and the original query.
        return view('recettes.result', compact('recettesfound', 'query', 'recettes'));
    }
}
