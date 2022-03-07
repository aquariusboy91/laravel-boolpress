<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Model\Boolpress;
use App\Model\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BoolpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Boolpress::paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id'=>'exists:App\Model\Category,id'
        ]);

       

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $slug = Str::slug($data['title'], '-');
        $postPresente = Boolpress::where('slug', $slug)->first();

        $img_path = Storage::put('uploads' , $data['image']);

        $newPost = new Boolpress();

        $newPost->fill($data);
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route('admin.boolpresses.show', $newPost);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function show(Boolpress $boolpress)
    {
        return view('admin.posts.show', ['post' => $boolpress]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function edit(Boolpress $boolpress)
    {
        if (Auth::user()->id != $boolpress->user_id) {
            abort('403');
        }
        $categories = Category::all();

        return view('admin.posts.edit', ['post' => $boolpress, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boolpress $boolpress)
    {
        $data = $request->all();
        if (Auth::user()->id != $boolpress->user_id) {
            abort('403');
        }

        


        $postValidate = $request->validate(
            [
                'title' => 'required|max:240',
                'content' => 'required',
                'category_id' => 'exists:App\Model\Category,id'
            ]
        );

        $boolpress->update();

        return redirect()->route('admin.boolpresses.show', $boolpress);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boolpress $boolpress)
    {
        $boolpress->delete();

        return redirect()->route('admin.boolpresses.index')->with('status', "Post id $boolpress->id deleted");
    }
}
