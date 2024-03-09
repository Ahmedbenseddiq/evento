<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(){
        $categories = category::all();
        return view('admin.categories', ['categories' => $categories]);
    }    

    public function create(){
        return view('admin.createCategory');
    }

    public function store(Request $request){
        // dd($request);

        $data = $request->validate([
            'name' => 'alpha:ascii', 
        ]);

        $newCategory = Category::create($data);
        return redirect(route('admin.categories'));
    }

    public function edit(category $category){
        // dd($category);
        return view('admin.editCategory', ['category' => $category]);
    }

    public function update(category $category, Request $request){
        $data = $request->validate([
            'name' => 'alpha:ascii', 
        ]);

        $category->update($data);
        return redirect(route('admin.categories'))->with('success', 'category update successfully');
    }

    public function destroy(category $category){
        $category->delete();
        return redirect(route('admin.categories'))->with('success', 'category delete successfully');
    }
}
