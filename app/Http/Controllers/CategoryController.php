<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as Category;

class CategoryController extends Controller
{
    //
    public function index(){
    	$categories = Category::all();
    	return \View::make('categories/list',compact('categories'));
    }

	public function create(){
		return \View::make('categories/new');
	}

    public function edit($id){
        $category = Category::find($id);
        return \View::make('categories/update',compact('category'));
    }

    public function update($id, Request $request){

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('category');
    }

    public function store(Request $request){

    	$category = new Category;
    	$category->name = $request->name;
        $category->status_id = 1;
    	$category->save();
    	return redirect('category');
    }

    public function show(Request $request){
        //Filtro LIKE
        $categories = Category::where('name','like','%'.$request->name.'%')->get();
        return \View::make('categories/list',compact('categories'));

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
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }
}
