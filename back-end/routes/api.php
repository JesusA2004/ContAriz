<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CuentaBancariaController;
use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\EmpresaFacturacionController;
use App\Http\Controllers\Api\HistorialQuincenaController;
use App\Http\Controllers\Api\PatronController;
use App\Http\Controllers\Api\PrimaVacacionaleController;
use App\Http\Controllers\Api\SaldoImssController;
use App\Http\Controllers\Api\SupervisoreController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VacacioneController;
use App\Http\Controllers\Api\PlazaController;

// Rutas de autenticación
Route::prefix('auth')->group(function () {

    Route::post('register', [AuthController::class, 'register']);    // Registro de usuario
    Route::post('login',    [AuthController::class, 'login']);       // Login y obtención de token
    Route::post('refresh',  [AuthController::class, 'refresh']);     // Refrescar token

    // Rutas protegidas (necesitan token válido)
    Route::middleware('auth:api')->group(function () {
        Route::post('logout',      [AuthController::class, 'logout']);
        Route::get('user-profile', [AuthController::class, 'userProfile']);
    });
    
});

// Rutas CRUD protegidas por JWT
Route::middleware('auth:api')->group(function () {
    Route::apiResource('users',                UserController::class);

    Route::apiResource('patrons',              PatronController::class);

    Route::apiResource('empresas-facturacion', EmpresaFacturacionController::class);

    Route::apiResource('departamentos',        DepartamentoController::class);

    Route::apiResource('empleados',            EmpleadoController::class);

    Route::apiResource('cuentas-bancarias',    CuentaBancariaController::class);

    Route::apiResource('historial-quincenas',  HistorialQuincenaController::class);

    Route::apiResource('prima-vacacionales',   PrimaVacacionaleController::class);

    Route::apiResource('saldo-imss',           SaldoImssController::class);

    Route::apiResource('supervisores',         SupervisoreController::class);

    Route::apiResource('vacaciones',           VacacioneController::class);

    Route::apiResource('plazas',           PlazaController::class);

});
