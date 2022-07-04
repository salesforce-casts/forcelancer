<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchResourceController extends Controller
{
    public function index() {
        return view('search.resource');
    }
}
