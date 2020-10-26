<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class OrdenPdfController extends Controller
{

    public function imprimir(){
        //$today = Carbon::now()->format('d/m/Y');
        //$pdf = \PDF::loadView('ejemplo', compact('today'));
        $pdf = \PDF::loadView('ordenpdf');
        return $pdf->download('ordenpdf.pdf');
    }
}
