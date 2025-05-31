<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Vistas_Controller extends Controller
{
    public function Login(){
        return view('index');
    }

    public function Home(){
        return view('Dashboard.Home');
    }

    public function RegistrarCliente(){
        return view('Dashboard.RegistrarCliente');
    }

    public function RegistrarServicio(){
        return view('Dashboard.AgregarServicio');
    }

    public function Buscar(){
        return view('Dashboard.Buscar');
    }
    
    public function VistaServiciosRegistrados(){
        return view('Dashboard.ServiciosRegistrados');
    }

    public function VistaServiciosCompletados(){
        return view('Dashboard.ServiciosCompletados');
    }
}
