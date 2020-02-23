<?php

namespace App\Http\Controllers\Web\Admin;

use App\Advertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AdvertiseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'advertises' => Advertise::orderBy('id', 'desc')->get()
        );
        return view('admin.advertise.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertise  = new Advertise();
        return view('admin.advertise.create', compact('advertise'));
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
            'image' => 'required',
            'preview_resource' => 'required',
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
        $advertises = new Advertise();
        $advertises->name = $request->name;
        $advertises->preview_resource = $request->preview_resource;
        $advertises->image = $fileNameToStore;
        $advertises->save();
        return Redirect('admin/advertise');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function show(Advertise $advertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertise $advertise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertise $advertise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advertise  $advertise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertise $advertise)
    {
        if ($advertise->delete()) {
            Session::flash('response', array('type' => 'success', 'message' => 'Advertise deleted successfully!'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
        }
        return redirect('admin/advertise');
    }
}