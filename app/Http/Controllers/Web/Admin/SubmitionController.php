<?php

namespace App\Http\Controllers\Web\Admin;

use App\Submition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SubmitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'submits' => Submition::orderBy('id', 'desc')->get()
        );
        return view('fontend.submit.index', $data);
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
        $submit = Submition::where('id', $id)->firstOrFail();
        $result = $submit->delete();

        if ($result) {
            Session::flash('response', array('type' => 'success', 'message' => 'Resource Remove Successfully'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went Wrong!'));
        }

        return redirect('admin/resource_submit');
    }
}