<?php

namespace App\Http\Controllers\Web\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::latest()->take(12)->get();
        $categories = Category::all();
        $randomitems = Item::all()->random(8);
        return view('welcome', compact('items', 'categories', 'randomitems'));
    }
}
