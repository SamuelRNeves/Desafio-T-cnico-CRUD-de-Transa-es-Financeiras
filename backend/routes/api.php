<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransacaoController;

Route::apiResource('transacoes', TransacaoController::class);
