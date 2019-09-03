<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class UserController extends Controller
{
    //
    public function index(){
    	$users = User::all();
    	return \View::make('users/list',compact('users'));
    }

	public function create(){
		return \View::make('users/new');
	}

    public function edit($id){
        $user = User::find($id);
        $statuses = Status::all();
        return \View::make('users/update',compact('user','statuses'));
    }

    public function update($id, Request $request){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('user');
    }

    public function store(Request $request){

    	//OPCION 1
    	$user = new User;
    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->status_id = 1;
        $user->password = $request->password;
    	$user->save();
    	return redirect('user');

    	//OPCION 2
    	/*$movie = new Movie;
    	$movie->create($request->all());
    	return redirect('movie');*/

    }

    public function show(Request $request){
        //Filtro LIKE
        $users = User::where('name','like','%'.$request->name.'%')
        			   ->orWhere('email','like','%'.$request->name.'%')
        			   ->get();
        return \View::make('users/list',compact('users'));

        //Filtro Nombre exacto
        //$movies = Movie::where('name','=',$request->name)->get();

        //Filtro Fecha mayor
        //$movies = Movie::where('created_at','>',$date)->get();

        //Filtro Fecha inferior
        //$movies = Movie::where('created_at','<',$date)->get();

        //Filtro Fecha mayor y nombre
        //$movies = Movie::where('created_at','>',$date)->where('name','=',$request->name)->get();

        //Filtro Fecha mayor o nombre
        //$movies = Movie::where('created_at','>',$name)->orWhere('name','=',$name_2)->get();
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
