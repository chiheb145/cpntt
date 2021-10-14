<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRM\SignController;
use App\Http\Controllers\CRM\TestController;
use App\Http\Controllers\CRM\LeadsController;
use App\Http\Controllers\CRM\ProfileController;
use App\Http\Controllers\CRM\CalendarController;
use App\Http\Controllers\CRM\ClientsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("clients/get", [ClientsController::class, "getClients"]);

Route::prefix("sign")->group(function(){
  Route::post("in",[SignController::class,"signIn"]);
  Route::post("up",[SignController::class,"signUp"]);
  Route::middleware(['auth:api'])->get('data', [SignController::class,"signData"]);
  Route::middleware(['auth:api'])->get('out',  [SignController::class,"signOut"]);
});

Route::middleware(["auth:api"])->group(function(){

  Route::prefix("test")->group(function(){
    
    Route::get("activities/get",[TestController::class,"activitiesGet"]);
    Route::get("transitions/get", [TestController::class,"transitionsGet"]);
    Route::get("events/get", [TestController::class,"eventsGet"]);
    Route::post("events/add",[TestController::class,"eventsAdd"]);
    
    Route::get("service/turnover/{min}/{max}", [TestController::class,"serviceTurnover"]);
    Route::get("company/siren/{siren}",[TestController::class,"comapnySiren"]);
    
    Route::post("contact/save",[TestController::class,"saveContact"]);
    Route::post("contact/confirm",[TestController::class,"confirmContact"]);
    
    Route::post("zoom/generate",[TestController::class,"generateZoom"]);
    
    Route::prefix("grants")->group(function(){
        Route::get("cpn/{service}/{budget}",[TestController::class,"cpnGrant"]);
        Route::get("region/{region}/{budget}/{naf}",[TestController::class,"regionGrant"]);
    });
    
    Route::post("timer/save", [TestController::class, "saveTimer"]);
  
  });
  
  Route::prefix("leads")->group(function(){
  
    Route::get("contacts/all",[LeadsController::class,"getLeadsList"]);
    Route::get("contacts/{cid}",[LeadsController::class,"getLeadContact"]);
    Route::post("email/resend",[LeadsController::class,"resendMail"]);
  
  });
  
  Route::prefix("calendar")->group(function(){
    Route::get("events/get",[CalendarController::class,"getEvents"]);
  });
  
  Route::prefix("profile")->group(function(){
    Route::post("image/save",[ProfileController::class, "saveImage"]);
  });
  
  Route::prefix("supervisor")->group(function(){
    Route::get("calendar/events", [CalendarController::class,"getEvents"]);
    Route::get("clients/get", [ClientsController::class, "getClients"]);
  });

});




