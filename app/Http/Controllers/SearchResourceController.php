<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Resource;
use Illuminate\Http\Request;

class SearchResourceController extends Controller
{
    protected $resourceRateType = [
        'hourly' => 'hourly_rate', 
        'weekly' => 'weekly_rate', 
        'monthly' => 'monthly_rate'
    ];

    public function index(Request $request) 
    {
        $priceFilterOnColumn = null;

        if($request->filled('resourceRateType') && array_key_exists($request->input('resourceRateType'), $this->resourceRateType)) {
            $priceFilterOnColumn = $this->resourceRateType[$request->input('resourceRateType')];
        }

        $countries = Country::pluck("name", "id")->all();
        $resourceDetails = Resource::with(['user'])->newQuery();

        if($request->has('keyword') && !empty($request->keyword)) {
            $resourceDetails
                ->where(function($query) use($request){
                    return $query->where('email', 'LIKE', '%'.$request->input('keyword').'%')
                        ->orWhere('skills', 'LIKE', '%'.$request->input('keyword').'%')
                        ->orWhere('describe', 'LIKE', '%'.$request->input('keyword').'%');

                })
                ->orWhereHas('user', function($query) use($request){
                    return $query->where('name', 'LIKE', '%'.$request->input('keyword').'%');
                });
        }

        if($request->filled('countryName') && $request->countryName !== 'null') {
            $resourceDetails->where('country', $request->input('countryName'));
        }

        if(($request->has('minPrice') && $request->has('maxPrice')) && ($request->minPrice > 0 && $request->maxPrice > 0) && $priceFilterOnColumn) {

            $resourceDetails->whereBetween($priceFilterOnColumn, [$request->input('minPrice'), $request->input('maxPrice')]);
        }

        $resourceDetails = $resourceDetails->orderBy('id', 'desc')->paginate(15)->withQueryString();
        
        return view('searchResource.index', ['countries' => $countries, 'resourceDetails' => $resourceDetails]);
    }
}
