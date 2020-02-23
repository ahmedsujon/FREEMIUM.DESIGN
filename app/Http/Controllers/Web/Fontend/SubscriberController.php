<?php

namespace App\Http\Controllers\Web\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;
use Session;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        if ($validated == true) {
            $subscribe = new Subscriber();
            $subscribe->email = $request->email;

            if ($subscribe->save()) {
                Session::flash('response', array('type' => 'success', 'message' => 'Subscribe successfully!'));
            } else {
                Session::flash('response', array('type' => 'error', 'message' => 'Something Went wrong!'));
            }
            return redirect()->back();
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Data not valid!'));
            return redirect()->back();
        }
    }
}