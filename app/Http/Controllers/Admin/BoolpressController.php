<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Model\Boolpress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.posts.create');
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
        ]);

        $data = $request->all();

        $slug = Str::slug($data['title'], '-');
        $postPresente = Boolpress::where('slug', $slug)->first();

        $newPost = new Boolpress();

        $newPost->fill($data);
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route('admin.posts.show', ['post' => $newPost]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function show(Boolpress $boolpress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function edit(Boolpress $boolpress)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boolpress  $boolpress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boolpress $boolpress)
    {
        //
    }
}
