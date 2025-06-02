<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Vistas_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UsersController;
use App\Models\ServiceOrder;

#--- Ruta Login ---#
Route::get('/', [Vistas_Controller::class, 'Login'])->name('login');
Route::post('/check_login', [LoginController::class, 'IniciarSesion'])->name('IniciarSesion');
Route::post('/logout', [LoginController::class, 'LogOut'])->name('LogOut');

#--- Ruta Administrador ---#
Route::get('/home', [Vistas_Controller::class, 'Home'])->name('Home');
Route::get('/registrar_cliente', [Vistas_Controller::class, 'RegistrarCliente'])->name('RegistrarCliente');
Route::get('/agregar_servicio', [Vistas_Controller::class, 'RegistrarServicio'])->name('AgregarServicio');
Route::get('/services_complete', [Vistas_Controller::class, 'VistaServiciosCompletados'])->name('ServiciosCompletados');


//RUTAS PARA PLANTILLAS PDF
Route::get('generate085MG', [PdfController::class, 'generatePdf085MG']);
Route::get('generate085G', [PdfController::class, 'generatePdf085G']);
Route::get('generate085L', [PdfController::class, 'generatePdf085L']);
Route::get('generate085ML', [PdfController::class, 'generatePdf085ML']);


Route::get('/search',[Vistas_Controller::class, 'Buscar'])->name('Buscar');
Route::get('/servicios_registrados', [Vistas_Controller::class, 'VistaServiciosRegistrados'])->name('ServiciosRegistrados');

//Rutas para registros
Route::post('/register_order', [ServiceOrder::class, 'Registrarorden'])->name('Registrar_Orden');
Route::post('/register_user', [UsersController::class, 'registrarusuarios'])->name('regis');
