<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GeneralController;   
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\DivisaController;
use App\Http\Controllers\Admin\CotizacionController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\StockController;

route::get('', [HomeController::class, 'index'])->name('admin.home');
route::resource('generales', GeneralController::class)->names('admin.generales');
route::resource('categorias', CategoriaController::class)->names('admin.categorias');
route::resource('productos', ProductoController::class)->names('admin.productos');
route::resource('clientes', ClienteController::class)->names('admin.clientes');
route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
route::resource('mails', MailController::class)->names('admin.mails');
route::resource('divisas', DivisaController::class)->names('admin.cotizaciondiv');
route::resource('cotizaciones', CotizacionController::class)->names('admin.cotizaciones');
route::resource('pedidos', PedidoController::class)->names('admin.pedidos');
route::resource('stocks', StockController::class)->names('admin.stocks');