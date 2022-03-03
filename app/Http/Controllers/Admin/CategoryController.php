<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
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

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required'
        ]);

        $data = $request->all();
        $slug = Str::slug($data['name'], '-');
        $postPresente = Category::where('slug', $slug)->first();

        $newCategory = new Category();
        $newCategory->fill($data);
        $newCategory->slug = $slug;
        $newCategory->save();

        return redirect()->route('admin.categories.show', $newCategory);
    }

    public function create()
    {
       
        return view('admin.categories.create');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', "Category $category->name deleted");
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        
        $updated =  $category->update($data);
       

        return redirect()->route('admin.categories.show', $category);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }
}
