<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(){
        $categories= category::all();
        return view('back.ShowCategory',['categories'=> $categories]);
    }
    public function form(){
        return view('back.FormCategory');
    }
    public function add(Request $request){

       $data =$request->validate([
        'name'=>'required|unique:categories,name',
        'description'=>'required',],

        [
            'name.required' => 'Le champ name est obligatoire.',
            'name.unique' => 'Cette catégorie existe déjà.',
             
        'description.required' => 'Le champ description est obligatoire.',]
       );
       $newCategory=category::create($data);
       return redirect(route('showCategory'));

    }
    public function edit(category $category){
        return view('back.FormEdit',['category'=>$category]);
    }
    public function update(category $category,Request $request){
        $data =$request->validate([
            'name'=>'required',
            'description'=>'required',
           ]);
           $category->update($data);
           return redirect(route('showCategory'))->with('success','category updated successfully');
    }
    public function destroy(category $category){
        $category->delete();
        return redirect(route('showCategory'))->with('success','category deleted successfully');
    }
    public function search(Request $request)
{
    $search = $request->input('search');

    // Effectuez la recherche dans la base de données en fonction du nom de la catégorie
    $CATEGORIES = Category::where('name', 'like', '%' . $search . '%')->get();

    return view('back.SearchCategorie', ['categories' => $CATEGORIES]);
}
}
