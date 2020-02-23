<?php

namespace App\Http\Controllers\Web\Admin;

use App\Item;
use App\Tag;
use App\Category;
use App\Subscriber;
use App\Notifications\NewItemNotify;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'items' => Item::orderBy('id', 'desc')->get()
        );
        return view('admin.item.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $items = new Item();
        return view('admin.item.create', compact('categories', 'items', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'sometimes',
            'image' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'preview_resource' => 'required',
            'download_resource' => 'required',
            'image' => 'required|max:2999',
        ]);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }
        $items = new Item();
        $items->title = $request->title;
        $items->slug = str_slug($request->title);
        $items->description = $request->description;
        $items->preview_resource = $request->preview_resource;
        $items->download_resource = $request->download_resource;
        $items->tag_id = $request->tag_id;
        $items->category_id = $request->category_id;
        $items->image = $fileNameToStore;
        $items->save();
        $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            Notification::route('mail', $subscriber->email)
                ->notify(new NewItemNotify($items));
        }
        return Redirect('admin/items');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $data = array(
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'items' => $item
        );
        return view('admin.item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'sometimes',
            'image' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'preview_resource' => 'required',
            'download_resource' => 'required',
            'image' => 'required|max:2999',
        ]);

        $items = Item::where('id', $id)->firstOrFail();
        $result = $items->update($data);
        if ($result) {
            Session::flash('response', array('type' => 'success', 'message' => 'Item Updated Successfully'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went Wrong!'));
        }

        return redirect('admin/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if ($item->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Item deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('admin/items');
    }
}