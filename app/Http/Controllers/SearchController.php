<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $searchText = $request->get('body');
        // $u = [
        //     'key' => 'value',
        //     'key1' => 'value1',
        // ];
        // $resources = Resource::where('title', 'LIKE', '%' . $searchText . '%')
        //     ->orWhere('describe', 'LIKE', '%' . $searchText . '%')
        //     ->get();
        $res = Resource::find(11);
        return $res;
    }
}
