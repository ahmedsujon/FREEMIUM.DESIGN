<?php

namespace App\Http\Controllers\Web\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'tags' => Tag::orderBy('id', 'desc')->get()
        );
        return view('admin.tag.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag  = new Tag();
        return view('admin.tag.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if ($validated == true) {
            $tag = new Tag();
            $tag->name = $request->name;
            $tag->slug = str_slug($request->name);
            $tag->status = $request->status;

            if ($tag->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Tag added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admin/tags');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admin/tags/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $data = array(
            'tag' => $tag
        );
        return view('admin.tag.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if ($validated == true) {
            $tag->name = $request->name;
            $tag->slug = str_slug($request->name);
            $tag->status = $request->status;

            if ($tag->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Tag updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admin/tags');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admin/tags/create/' . $tag->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('admin/tags');
    }
}