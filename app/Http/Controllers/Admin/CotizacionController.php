<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CotizacionBna;

class CotizacionController extends Controller
{
    public function index(){
        $cot = new CotizacionBna();
        $cot->getCotiz();
        return view('admin.quotation.index');
    }

    public function create(){
        return view('admin.quotation.create');
    }
}
