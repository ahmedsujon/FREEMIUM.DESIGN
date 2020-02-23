<?php

namespace App\Http\Controllers\Web\Fontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('title', 'LIKE', "%$query%")->get();
        return view('fontend.search', compact('items', 'query'));
    }
}