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
        $country = $request->input('country');
        $tags = $request->input('tags');

        if ($query == null && $country == null && $tags == null) {
            $resources = Resource::limit(25)->orderBy("created_at", "desc")->get();
        } else {
            $resources = '';
            $resources_from_tags = '';

            if ($query != null && $country != null) {
                $resources = Resource::select('id', 'name', 'describe', 'country')
                    ->where('describe', 'LIKE', '%' . $query . '%')
                    // ->orwhere('title', 'LIKE', '%' . $query . '%')
                    ->orWhere('country', '=', $country)
                    ->get();
            }
            if ($query != null && $country == null) {
                $resources = Resource::select('id', 'name', 'describe', 'country')
                    ->where('name', 'LIKE', '%' . $query . '%')
                    ->get();
            }
            if ($query == null && $country != null) {
                $resources = Resource::select('id', 'name', 'describe', 'country')
                    ->where('country', '=', $country)
                    ->get();
            }
            if ($tags != null) {
                $resources_from_tags = Resource::leftJoin('tags', 'tags.resource_id', '=', 'resources.id')
                    ->select('resources.id', 'resources.name', 'resources.describe', 'resources.country')
                    ->whereIn('tags.id', $tags)
                    ->distinct()
                    ->get();
            }

            if ($query != null && $tags != null) {
                $concatenated_resources = $resources->concat($resources_from_tags);
                $unique_resources = $concatenated_resources->unique();
            }
            return $unique_resources;
        }

        return $resources;
    }
}
