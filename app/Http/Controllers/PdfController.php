<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode; //ESTA LIBRERIA ES PARA LA FIRMA ELECTRONICA 

class PdfController extends Controller
{
 

public function generatePdf085G(Request $request)
{
    $qr = \QrCode::size(100)->generate('https://tusitio.com/verificar/085G');

    $datos = [
        'qr' => $qr,
        'numero_informe' => 'FE085G/250405-01',
        'orden_servicio' => '25-1347',
        'fecha_evaluacion' => '5-ABRIL-25',
        'recepcion' => '6-ABRIL-25',
        'fecha_informe' => '11-ABRIL-25',
        'mostrar_boton' => true // bandera para mostrar botón solo en navegador
    ];

    if ($request->has('descargar')) {
        $pdf = \PDF::loadView('pdf.template085G', array_merge($datos, ['modo' => 'pdf']));
        return $pdf->download('plantilla085G.pdf');
    }
    return view('pdf.template085G', array_merge($datos, ['modo' => 'web']));
}

 public function generatePdf085MG(Request $request)
    {
        $qr = \QrCode::size(100)->generate('https://tusitio.com/verificar/085MG');

        // Datos fijos del encabezado
        $datos = [
            'qr' => $qr,
            'numero_informe' => 'FE085MG/250405-01',
            'orden_servicio' => '25-1347',
            'fecha_evaluacion' => '5-ABRIL-25',
            'recepcion' => '6-ABRIL-25',
            'fecha_informe' => '11-ABRIL-25',

            'grafica_co' => $request->input('grafica_co'),  // debe coincidir con el name del input
            'grafica_o2' => $request->input('grafica_o2'),
            'grafica_co2' => $request->input('grafica_co2'),
   
            
            'mostrar_boton' => true
        ];

        // Datos de la tabla de analitos
        $analito_no = [1, 2, 3];
        $analito_CO = [24, 27, 28];
        $analito_O2 = [4.42, 4.42, 4.22];
        $analito_CO2 = [9.80, 11.10, 11.13];
        $analito_temp = [188.4, 191.5, 190.5];

        // Agrupamos todos los datos en un solo array para pasar a la vista
        $datos_analito = [
            'analito_no' => $analito_no,
            'analito_CO' => $analito_CO,
            'analito_O2' => $analito_O2,
            'analito_CO2' => $analito_CO2,
            'analito_temp' => $analito_temp
        ];

        $datos_completos = array_merge($datos, $datos_analito, ['modo' => $request->has('descargar') ? 'pdf' : 'web']);

        if ($request->has('descargar')) {
            $pdf = \PDF::loadView('pdf.template085MG', $datos_completos);
            return $pdf->download('plantilla085MG.pdf');
        }

        return view('pdf.template085MG', $datos_completos);
    }

 public function generatePdf085ML(Request $request)
{
    $qr = \QrCode::size(100)->generate('https://tusitio.com/verificar/085ML');

    $datos = [
        'qr' => $qr,
        'numero_informe' => 'FE085ML/250405-01',
        'orden_servicio' => '25-1347',
        'fecha_evaluacion' => '5-ABRIL-25',
        'recepcion' => '6-ABRIL-25',
        'fecha_informe' => '11-ABRIL-25',
        'mostrar_boton' => true // bandera para mostrar botón solo en navegador
    ];

    if ($request->has('descargar')) {
        $pdf = \PDF::loadView('pdf.template085ML', array_merge($datos, ['modo' => 'pdf']));
        return $pdf->download('plantilla085ML.pdf');
    }
    return view('pdf.template085ML', array_merge($datos, ['modo' => 'web']));
}

 public function generatePdf085L(Request $request)
{
    $qr = \QrCode::size(100)->generate('https://tusitio.com/verificar/085L');

    $datos = [
        'qr' => $qr,
        'numero_informe' => 'FE085L/250422-01',
        'orden_servicio' => '25-1425',
        'fecha_evaluacion' => '22-ABRIL-25',
        'recepcion' => '23-ABRIL-25',
        'fecha_informe' => '30-ABRIL-25',
        'mostrar_boton' => true // bandera para mostrar botón solo en navegador
    ];

    if ($request->has('descargar')) {
        $pdf = \PDF::loadView('pdf.template085L', array_merge($datos, ['modo' => 'pdf']));
        return $pdf->download('plantilla085L.pdf');
    }
    return view('pdf.template085L', array_merge($datos, ['modo' => 'web']));
}







}