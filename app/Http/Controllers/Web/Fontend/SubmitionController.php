<?php

namespace App\Http\Controllers\Web\Fontend;

use App\Submition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SubmitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fontend.resource');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'preview_resource' => 'required',
            'sketch_resource' => 'required',
            'name' => 'required',
            'preview_website' => 'required',
            'email' => 'required',
        ]);

        if ($validated == true) {
            $submits = new Submition();
            $submits->preview_resource = $request->preview_resource;
            $submits->sketch_resource = $request->sketch_resource;
            $submits->name = $request->name;
            $submits->preview_website = $request->preview_website;
            $submits->email = $request->email;

            if ($submits->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Resource Sumbit successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect()->back();
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect()->back();
        }
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
     * @param  \App\Submition  $submition
     * @return \Illuminate\Http\Response
     */
    public function show(Submition $submition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submition  $submition
     * @return \Illuminate\Http\Response
     */
    public function edit(Submition $submition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submition  $submition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submition $submition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submition  $submition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submition $submition)
    {
        //
    }
}
