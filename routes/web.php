<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdmin;
use App\Http\Controllers\adminController;

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

Route::get('/logout',[adminController::class,'logout']);
Route::get('/login',[adminController::class,'login']);
Route::post('/login',[adminController::class,'doLogin']);

// Cron job route for sending notification emails
// Example cron: 0 8 * * * curl -s https://yourdomain.com/cron/send-notifications?key=YOUR_SECRET_KEY
Route::get('/cron/send-notifications',[adminController::class,'sendNotificationsCron']);


Route::middleware([EnsureAdmin::class])->group(function () {
    Route::get('/',[adminController::class,'index']);
    Route::post('/updateProfile',[adminController::class,'updateProfile']);
    Route::post('/updatePassword',[adminController::class,'updatePassword']);
    Route::post('/addMember',[adminController::class,'addMember']);
    Route::post('/updateMember',[adminController::class,'updateMember']);
    Route::post('/toggleMemberStatus',[adminController::class,'toggleMemberStatus']);
    Route::post('/addCustomField',[adminController::class,'addCustomField']);
    Route::post('/updateCustomField',[adminController::class,'updateCustomField']);
    Route::post('/deleteCustomField',[adminController::class,'deleteCustomField']);
    Route::post('/addOtherItems',[adminController::class,'addOtherItems']);
    Route::post('/updateOtherItems',[adminController::class,'updateOtherItems']);
    Route::post('/deleteOtherItems',[adminController::class,'deleteOtherItems']);

    Route::post('/addJob',[adminController::class,'addJob']);

    Route::get('/calendar', function (adminController $controller) { return $controller->view2('calendar'); });
    Route::get('/settings', function (adminController $controller) { return $controller->view2('settings'); });
    Route::get('/clients', function (adminController $controller) { return $controller->view2('clients'); });
    Route::get('/jobs', function (adminController $controller) { return $controller->view2('jobs'); });

    Route::get('/jobs/{id}',[adminController::class,'jobs']);
    Route::put('/jobs/{id}/status',[adminController::class,'updateJobStatus']);
    Route::put('/jobs/{id}/visit-date',[adminController::class,'updateJobVisitDate']);
    Route::delete('/jobs/{id}',[adminController::class,'deleteJob']);

    Route::post('/clients',[adminController::class,'storeClient']);
    Route::get('/clients/{id}',[adminController::class,'clients']);
    Route::get('/clients/{id}/data',[adminController::class,'getClient']);
    Route::put('/clients/{id}',[adminController::class,'updateClient']);
    Route::put('/clients/{id}/status',[adminController::class,'updateClientStatus']);
    Route::delete('/clients/{id}',[adminController::class,'deleteClient']);
    Route::post('/notes',[adminController::class,'storeNote']);
    Route::post('/get-item-fields',[adminController::class,'getItemFields']);
    Route::post('/other-data',[adminController::class,'storeOtherData']);
    Route::get('/other-data/{id}',[adminController::class,'getOtherData']);
    Route::put('/other-data/{id}',[adminController::class,'updateOtherData']);
    Route::get('/api/clients-list',[adminController::class,'getClientsList']);
    Route::get('/api/credentials-list',[adminController::class,'getCredentialsList']);
    Route::get('/api/calendar-events',[adminController::class,'getCalendarEvents']);
    Route::post('/api/alert-settings',[adminController::class,'updateAlertSettings']);
    Route::get('/api/alert-settings',[adminController::class,'getAlertSettings']);

});

/*


 */



