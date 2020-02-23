<?php

namespace App\Http\Controllers\Web\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Tag;
use App\Advertise;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->latest()->paginate(24);
        return view('fontend.all_item', compact('items'));
    }

    public function details($slug)
    {
        $advertise = Advertise::all()->toArray();
        $items = Item::with('category')->where('slug', $slug)->first();
        $randomitems = Item::all()->random(6);
        return view('fontend.single_item', compact('items', 'randomitems', 'advertise'));
    }

    public function itemByCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $items = $category->items()->paginate(24);

        return view('fontend.category_items', compact('category', 'items'));
    }

    public function itemByTag($slug)
    {

        $tag = Tag::where('slug', $slug)->first();
        $items = $tag->items()->paginate(24);
        return view('fontend.tag_item', compact('tag', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
