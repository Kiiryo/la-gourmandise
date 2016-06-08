<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Recette::paginate(5);

        return view('recettes.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required',
            'category' => 'required', 'recette' => 'required', 'image' => 'required', 'difficulte' => 'required']);

        $recet = new Recette;
        if($request->file('image') != null){
            $imageName = $recet->id . 'img.' . $request->file('image')->getClientOriginalExtension();
            $recet->image        = $imageName;
            $imageName = $recet->id . 'img.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image1')->move(
                base_path() . '/public/img/recet_img', $imageName
            );

        }
        $recet->user_id       = Auth::user()->id;
        $recet->username      = Auth::user()->name;
        $recet->id            = $request->id;
        $recet->title         = $request->title;
        $recet->category      = $request->category;
        $recet->difficulte    = $request->difficulte;
        $recet->description   = $request->description;
        $recet->recette       = $request->recette;
        $recet->save();

        return redirect()->route('recette.index')->with('success', 'Votre Recette a bien été soumis.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::findOrFail($id);

        return view('recettes.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::findOrFail($id);
        return view('recettes.edit', compact('recette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required', 'description' => 'required',
            'category' => 'required', 'recette' => 'required', 'difficulte' => 'required']);

        $recet = Recette::find($id);
        $recet->user_id       = Auth::user()->id;
        $recet->username      = Auth::user()->name;
        $recet->id            = $request->id;
        $recet->title         = $request->title;
        $recet->category      = $request->category;
        $recet->difficulte    = $request->difficulte;
        $recet->description   = $request->description;
        $recet->recette      = $request->recette;
        $recet->validate      = $request->validate;
        $recet->save();
        return redirect()->route('recette.show',$recet->id)->with('success', 'Votre recette a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recette = Recette::findOrFail($id);
        $recette->delete();
        return redirect()->route('recette.index', $id)->with('success', 'Votre recette a bien été supprimé.');
    }
}
