<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cdProducts = Product::where('type', 'CD')->latest()->take(12)->get();
        $bookProducts = Product::where('type', 'BOOK')->latest()->take(12)->get();
        return view('home', compact('cdProducts', 'bookProducts'));
    }

    public function allCd()
    {
        $cdProducts = Product::where('type', 'CD')->latest()->paginate(6);
        return view('frontend.cd', compact('cdProducts'));
    }

    public function allBook()
    {
        $bookProducts = Product::where('type', 'BOOK')->latest()->paginate(6);
        return view('frontend.book', compact('bookProducts'));
    }
}
