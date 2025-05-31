<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Vistas_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

#--- Ruta Login ---#
Route::get('/', [Vistas_Controller::class, 'Login'])->name('login');
Route::post('/check_login', [LoginController::class, 'IniciarSesion'])->name('IniciarSesion');
Route::post('/logout', [LoginController::class, 'LogOut'])->name('LogOut');

#--- Ruta Administrador ---#
Route::get('/home', [Vistas_Controller::class, 'Home'])->name('Home');
Route::get('/registrar_cliente', [Vistas_Controller::class, 'RegistrarCliente'])->name('RegistrarCliente');
Route::get('/agregar_servicio', [Vistas_Controller::class, 'RegistrarServicio'])->name('AgregarServicio');


//RUTAS PARA PLANTILLAS PDF
Route::get('generate085MG', [PdfController::class, 'generatePdf085MG']);
Route::get('generate085G', [PdfController::class, 'generatePdf085G']);


Route::get('/search',[Vistas_Controller::class, 'Buscar'])->name('Buscar');
Route::get('/servicios_registrados', [Vistas_Controller::class, 'VistaServiciosRegistrados'])->name('ServiciosRegistrados');