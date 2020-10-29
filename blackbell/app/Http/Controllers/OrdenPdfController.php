<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdenPdfController extends Controller
{

    public function imprimir(){
        //$today = Carbon::now()->format('d/m/Y');
        //$pdf = \PDF::loadView('ejemplo', compact('today'));
        $usuario = Auth::user();
        $nombres = $usuario->name.' '.$usuario->lastname;
        $pdf = \PDF::loadView('ordenpdf', $nombres);
        return $pdf->download('ordenpdf.pdf');
    }
}
