<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;

class AccessoryController extends Controller
{
    public function index(){
        return Accessory::all();
    }
}
