<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  // Assuming you are searching through products
use App\Models\Accessory;  // Assuming you are searching through products
use App\Models\User;  // Assuming you are searching through products

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'Like', '%' . $query . '%')
                          ->orWhere('brand', 'Like', '%' . $query . '%')
                          ->get();
    
        $accessoryResults = Accessory::where('name', 'Like', '%' . $query . '%')
                                     ->orWhere('brand', 'Like', '%' . $query . '%')
                                     ->get();
        
        $results = $results->merge($accessoryResults);
        // dd($results);
        // Pass the query and results to the view
        return view('search-results', compact('results', 'query'));
    }
    
}
