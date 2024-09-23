<?php

use App\Http\Controllers\Api\GuestsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('guests', GuestsController::class);
