<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie as Movie;
use App\Models\Status as Status;

class MovieController extends Controller
{

    //
    public function index(){
    	$movies = Movie::all();
        return \View::make('movies/list',compact('movies'));
    }

	public function create(){
		return \View::make('movies/new');
	}

    public function edit($id){

        $movie = Movie::find($id);
        $statuses = Status::where('id','<>',$movie->status_id)->get();
        return \View::make('movies/update',compact('movie','statuses'));
    }

    public function update($id, Request $request){

        $movie = Movie::find($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->save();
        return redirect('movie');
    }

    public function store(Request $request){
    	$movie = new Movie;
    	$movie->name = $request->name;
    	$movie->description = $request->description;
        $movie->status_id = 1;
        $movie->user_id = \Auth::user()->id;
    	$movie->save();
        return redirect('admin/movie');
    }

    public function show(Request $request){
        //Filtro LIKE
        $movies = Movie::where('name','like','%'.$request->name.'%')->get();
        return \View::make('movies/list',compact('movies'));

        //Filtro Nombre exacto
        //$movies = Movie::where('name','=',$request->name)->get();

        //Filtro Fecha mayor
        //$movies = Movie::where('created_at','>',$date)->get();

        //Filtro Fecha inferior
        //$movies = Movie::where('created_at','<',$date)->get();

        //Filtro Fecha mayor y nombre
        //$movies = Movie::where('created_at','>',$date)->where('name','=',$request->name)get();

        //Filtro Fecha mayor o nombre
        //$movies = Movie::where('created_at','>',$name)->orWhere('name','=',$name_2)get();
    }

    public function destroy($id){
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back();
    }
}
