<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Hirer;
use App\Models\HirerResource;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        # TODO: Handle the scenario where there is no resource associated to the logged in user
        $hirer = Hirer::where("user_id", Auth::id())->first();
        //        dd($hirer->id);
        $hirerResources = null;
        $oldHirerResources = null;
        if ($hirer != null) {
            $hirerResources = HirerResource::where([
                "hirer_id" => $hirer->id,
                "completed" => false,
            ])
                ->orderBy("created_at", "DESC")
                ->get();
            $oldHirerResources = HirerResource::where([
                "hirer_id" => $hirer->id,
                "completed" => true,
            ])
                ->orderBy("created_at", "DESC")
                ->get();
        }

        $resource = Resource::where("user_id", Auth::id());
        if ($hirerResources == null and $resource->count() == 1) {
            $resource = $resource->first();
            $hirerResources = HirerResource::where([
                "resource_id" => $resource->id,
                "completed" => false,
            ])
                ->orderBy("created_at", "DESC")
                ->get();
            $oldHirerResources = HirerResource::where([
                "resource_id" => $resource->id,
                "completed" => true,
            ])
                ->orderBy("created_at", "DESC")
                ->get();
        }
        $events = Event::where("user_id", Auth::id())
            ->orderBy("created_at", "DESC")
            ->get();

        $resourceRegistered = true;

        if(Auth::user()->user_type === 'resource' && !Auth::user()->resource) $resourceRegistered = false;

        return view(
            "dashboard",
            compact("hirerResources", "oldHirerResources", "events", "resourceRegistered")
        );
    }
}
