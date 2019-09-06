<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie as Movie;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return \View::make('movie/list', compact('movies'));
    }


    public function create()
    {
        return \View::make('movie/new');
    }

    public function store(Request $request)
    {
        if ($request->name == null || $request->description == null) {
            return;
        }

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->description = $request->description;

        $movie->save();
        return redirect('movie');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return \View::make('movie/update', compact('movie'));
    }


    public function update($id, Request $request)
    {
        $movie = Movie::find($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->save();
        return redirect('movie');
    }

    public function show(Request $request)
    {
        $movies = Movie::where('name', 'like', '%' . $request->name . '%')->get();
        return \View::make('movie/list', compact('movies'));
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back();
    }

}
