<?php

declare(strict_types=1);


use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware(['web',InitializeTenancyByDomain::class,PreventAccessFromCentralDomains::class])->group(function () {
    Route::get('/blog', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    Route::get('/user', function () {
        // return 'Hola , aca deberias ver a los usuarios';
        $user = User::All();
        dd($user);
    });

});
