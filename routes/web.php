<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\HireSuccessController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Mail\AvailableForHireNotification;
use App\Mail\ConfirmAvailabilityNotification;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\Resource;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [ResourceController::class, "index"])->name("home");

Route::get("/profile", [ResourceController::class, "create"])
    ->middleware("auth")
    ->name("create_profile");

Route::post("/profile", [ResourceController::class, "store"])
    ->middleware("auth")
    ->name("store_profile");

Route::get("/portfolio", [PortfolioController::class, "index"])
    ->middleware("auth")
    ->name("portfolio_list");
Route::post("/portfolio", [PortfolioController::class, "store"])
    ->middleware("auth")
    ->name("portfolio_store");

// move the business logic to Model
Route::post("/check-availability", function (Request $request) {
    // $projects = $request->get('proj');
    // $resource = Resource::where('email', Auth::user()->email)->first();

    $resourceInfo = $request->input("resourceInfo");
    $resourceId = $resourceInfo["resource_id"];

    // TODO: Make the logged in resource dynamic
    // TODO: Pass in the enquired user_id too,
    // would need it when responding.
    $resource = Resource::find($resourceId);
    Mail::to($resource->user->email)->send(
        new AvailableForHireNotification($resource)
    );
    return "A message has been sent";
})
    ->name("check.availability")
    ->middleware(["auth"]);

Route::get("/available/{resource}", function (Resource $resource) {
    // TODO: Change this to a separate view
    // TODO: Consider not using auth middleware
    // TODO: Get the email id dynamically
    Mail::to("teja@salesforcecasts.com")->send(
        new ConfirmAvailabilityNotification($resource)
    );
    return redirect()->route("dashboard");
})
    ->name("confirm-available")
    ->middleware(["auth", "signed"]);

// Route::post('/profile', [ResourceController::class, 'checkout'])
//     ->name('update_profile');

Route::get("/profile/show/{resource}", [
    ResourceController::class,
    "show",
])->name("show_profile");

Route::get("/dashboard", DashboardController::class)
    ->name("dashboard")
    ->middleware(["auth"]);

Route::get("/search", SearchController::class)->name("search");
Route::get("/tags", TagController::class)->name("tags");
Route::get("/countries", CountryController::class)->name("countries");
Route::get("/engagement/{hirerResource}/review", [
    ReviewController::class,
    "create",
])->name("show_review");
Route::post("/engagement/{hirerResource}/review", [
    ReviewController::class,
    "store",
])->name("store_review");
Route::post("/resource/hire", RazorpayController::class)
    ->name("hire")
    ->middleware("auth");
Route::post("/resource/hire/success", HireSuccessController::class)
    ->name("hire.success")
    ->middleware("auth");
require __DIR__ . "/auth.php";
