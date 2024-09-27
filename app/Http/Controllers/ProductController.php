<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function show($id){
        return Product::find($id);
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $results = Product::where('name', 'Like', '%' . $query . '%')
    //                       ->orWhere('brand', 'Like', '%' . $query . '%')
    //                       ->get();
    
    //     $accessoryResults = Accessory::where('name', 'Like', '%' . $query . '%')
    //                                  ->orWhere('brand', 'Like', '%' . $query . '%')
    //                                  ->get();
        
    //     $results = $results->merge($accessoryResults);
    //     // dd($results);
    //     // Pass the query and results to the view
    //     return view('search-results', compact('results', 'query'));
    // }
}
