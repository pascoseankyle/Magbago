<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $category = new Category();
        $category->name=$request->name;
        $category->save();
        return redirect('admin');
    }
    public function getAll(Request $request) {
        $category = Category::all();
        $id = $request->cookie('id');
        $type = $request->cookie('type');
        return view('/users/admin', compact('category', 'type', 'id'));
    }
    public function delete($id) {
        $delete = Category::find($id);
        $delete->delete();
        return redirect('admin');
    }   
    public function updateCat(Request $request) {
        $update = Category::find($request->cat_id);
        $update->name = $request->cat_name;
        $update->save();
        return redirect('admin');
    }
    public function showCat($id) {
        $cat = Category::find($id);
        return view('/users/updateCat', compact('cat'));
    }
    public function delcat($id) {
        $cat = Category::find($id);
        $cat->delete();
        return redirect('admin');
    }
}
