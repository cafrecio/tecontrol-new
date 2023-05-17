<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CotizacionBna;

class HomeController extends Controller
{
    public function index(){
        $cot = new CotizacionBna();
        $cotizaciones = $cot->getCotiz();
        return view('admin.index', compact('cotizaciones'));
    }
}
