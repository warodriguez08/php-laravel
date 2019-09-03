<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status as Status;

class StatusController extends Controller
{
    //
    public function index(){
    	$statuses = Status::all();
    	return \View::make('statuses/list',compact('statuses'));
    }

	public function create(){
		return \View::make('statuses/new');
	}

    public function edit($id){
        $status = Status::find($id);
        return \View::make('statuses/update',compact('status'));
    }

    public function update($id, Request $request){
        
        $status = Status::find($id);
        $status->status = $request->status;
        $status->save();
        return redirect('status');
    }

    public function store(Request $request){
    	
    	//OPCION 1
    	$status = new Status;
    	$status->status = $request->status;
    	$status->save();
    	return redirect('status'); 

    	//OPCION 2
    	/*$status = new Status;
    	$status->create($request->all());
    	return redirect('status');*/

    }

    public function show(Request $request){
        //Filtro LIKE
        $statuses = Status::where('status','like','%'.$request->status.'%')->get();
        return \View::make('statuses/list',compact('statuses'));

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
        $status = Status::find($id);
        $status->delete();
        return redirect()->back();
    }
}
