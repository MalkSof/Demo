<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comida;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comida = Comida::inRandomOrder()->take(8)->get();
        return view('shop')->with('comidas', $comida);
    }
    /**
     * Display a listing of the resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       
        $comida = Comida::where('slug', $slug)->firstOrFail();
        return view('comida')->with('comida', $comida);

    }

    
}
