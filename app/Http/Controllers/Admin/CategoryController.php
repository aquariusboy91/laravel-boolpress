<?php

namespace App\Http\Controllers\Admin;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
    $categories = Category::orderBy('name', 'desc')->paginate(15);

    return view('admin.categories.index', ['categories' => $categories]);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', ['category' => $category]);
    }
}
