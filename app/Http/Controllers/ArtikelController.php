<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $artikels = Artikel::where('user_id', Auth::user()->id)->get();
        $artikels = Cache::remember('artikel', 60, function () {
           return Artikel::where('user_id', Auth::user()->id)->get();
        });

        return view('artikel.dashboard', compact('artikels'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        // return $tags;
        return view('artikel.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $img = $request -> img;
        $name = time() . Auth::user()->name . $img->getClientOriginalExtension();

        $img -> storeAs('artikel/images/', $name, 's3');

        $data = $request -> all();
        Artikel::create([
            'user_id' => $data['user_id'],
            'tag_id' => $data['tag_id'],
            'title' => $data['title'],
            'slug' => Str::slug($request->title),
            'content' => $data['content'],
            'img' => $name,
        ]);
        // return $data;

        return redirect(route('artikel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
