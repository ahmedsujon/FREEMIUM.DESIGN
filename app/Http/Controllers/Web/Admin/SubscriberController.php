<?php

namespace App\Http\Controllers\Web\Admin;

use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array(
            'subscribers' => Subscriber::orderBy('id', 'desc')->get()
        );
        return view('fontend.subscribe.index', $data);
    }

    public function destroy($id)
    {
        $subscribers = Subscriber::where('id', $id)->firstOrFail();
        $result = $subscribers->delete();

        if ($result) {
            Session::flash('response', array('type' => 'success', 'message' => 'Subscriber Remove Successfully'));
        } else {
            Session::flash('response', array('type' => 'error', 'message' => 'Something Went Wrong!'));
        }

        return redirect('admin/subscriber');
    }
}