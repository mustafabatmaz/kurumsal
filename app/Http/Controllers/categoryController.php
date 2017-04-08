<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Page;
use App\Prodcut;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function new()
    {
        $category = new Category();
        $category->id = -1;
        return view('admin.category.edit', ['category' => $category]); 
    }

    public function save(Request $request)
    {
        if($request->input('id') == -1)
            $category = new Category();
        else
            $category = Category::find($request->input('id'));

        $category->slug = $request->input('slug');
        $category->name = $request->input('name');
        $category->save();
        return redirect('/kanepe');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect('/kanepe');
    }

}
