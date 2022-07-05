<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $searchText = $request->input("search");

        $searchText = preg_replace("/[^A-Za-z0-9\-]/", " ", $searchText);

        if (strpos($searchText, " ")) {
            $searchText = explode(" ", $searchText);
        }

        $country = $request->input("country");

        $tags = $request->input("tags");
        $decodedTags = urldecode($tags);
        if (strpos($decodedTags, ",")) {
            $tags = explode(",", $decodedTags);
        } else {
            $tags = $decodedTags;
        }

        $type = $request->input("type");
        $range = $request->input("range");

        if ($searchText == null && $country == null && $tags == null) {
            $resources = Resource::limit(25)
                ->orderBy("created_at", "desc")
                ->get();
        } else {
            $resources_from_tags = null;
            $query = Resource::query();
            $query->select("id", "describe", "country");

            if ($searchText != null) {
                $searchText = is_array($searchText)
                    ? $searchText
                    : [$searchText];

                foreach ($searchText as $st) {
                    $query->orWhere("describe", "like", "%" . $st . "%");
                }
            }
            if ($country != null) {
                $query->orWhere("country", "=", $country);
            }
            if ($type != null && $range != null) {
                if ($type == "Monthly") {
                    $type = "monthly_rate";
                } elseif ($type == "Weekly") {
                    $type = "weekly_rate";
                } elseif ($type == "Hourly") {
                    $type = "hourly_rate";
                }
                $query->orWhere($type, "<", $range);
            }

            $resources = $query->get();

            if ($tags != null) {
                $tags = is_array($tags) ? $tags : [$tags];

                $tagsList = Tag::select("id")
                    ->whereIn("name", $tags)
                    ->get();

                $resources_from_tags = Resource::leftJoin(
                    "tags",
                    "tags.resource_id",
                    "=",
                    "resources.id"
                )
                    ->select(
                        "resources.id",
                        "resources.describe",
                        "resources.country"
                    )
                    ->whereIn("tags.id", $tagsList)
                    ->distinct()
                    ->get();
            }

            if ($resources_from_tags != null) {
                $concatenated_resources = $resources->concat(
                    $resources_from_tags
                );
                $unique_resources = $concatenated_resources->unique();
                return $unique_resources;
            }
            return $resources;
        }

        return $resources;
    }
}
