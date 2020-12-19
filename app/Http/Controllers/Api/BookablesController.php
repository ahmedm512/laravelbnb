<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookables;
use Illuminate\Http\Request;

class BookablesController extends Controller
{
    public function index(){
        return Bookables::all();
    }

    public function show($id){
        return Bookables::findOrFail($id);
    }
}
