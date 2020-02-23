<?php

namespace App\Http\Controllers\Web\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'categories' => Category::orderBy('id', 'desc')->get()
        );
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category  = new Category();
        return view('admin.category.create', compact('category'));
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
            $category = new Category();
            $category->name = $request->name;
            $category->slug = str_slug($request->name);
            $category->status = $request->status;

            if ($category->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Category added successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admin/category');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admin/category/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = array(
            'category' => $category
        );
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        if ($validated == true) {
            $category->name = $request->name;
            $category->slug = str_slug($request->name);
            $category->status = $request->status;

            if ($category->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Category updated successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect('admin/category');
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect('admin/category/create/' . $category->id . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Category deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('admin/category');
    }
}