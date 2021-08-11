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
        $query = $request->input('query');

        if ($query == null) {
            $resources = Resource::limit(25)->orderBy("created_at", "desc")->get();
        } else {
            $resources = Resource::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('describe', 'LIKE', '%' . $query . '%')
                ->get();
            // $resources = $query;
        }

        return $resources;
    }
}
