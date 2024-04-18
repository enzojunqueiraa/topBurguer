<?php

use App\Http\Controllers\CadastroClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos',[ProdutoController::class,'index']);

Route::post('/produtos',[ProdutoController::class,'store']);

Route::get('/produtos/all', [ProdutoController::class,'index']);

Route::get('/clientes',[CadastroClienteController::class,'index']);

Route::post('/clientes',[CadastroClienteController::class,'store']);

Route::post('/carrinho/adicionar',[ProdutoController::class, 'adicionar']);