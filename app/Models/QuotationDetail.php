<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\CotizacionBna;

class QuotationDetail extends Model
{
    use HasFactory;

    public function quotation()
    {
        return $this->belongsTo('App\Models\Quotation');
    }

    public static function updateAllCot()
    {
        $cotizaciones = new CotizacionBna();
        $cotizaciones = $cotizaciones->getCotiz();

        if (
            $cotizaciones->dolarCompra != Currency::find(1)->compra ||
            $cotizaciones->dolarVenta != Currency::find(1)->venta ||
            $cotizaciones->euroCompra != Currency::find(2)->compra ||
            $cotizaciones->euroVenta != Currency::find(2)->venta
        ) {
            Currency::find(1)->update([
                'compra' => $cotizaciones->dolarCompra,
                'venta' => $cotizaciones->dolarVenta,
            ]);

            Currency::find(2)->update([
                'compra' => $cotizaciones->euroCompra,
                'venta' => $cotizaciones->euroVenta,
            ]);


            $details = self::where('facturado', 0)
                ->where('currency_id', '<', 3)
                ->get();

            foreach ($details as $detail) {
                // Actualizar los valores según el currency_id
                if ($detail->currency_id == 1) {
                    $detail->cotizacion = $cotizaciones->dolarVenta;
                } elseif ($detail->currency_id == 2) {
                    $detail->cotizacion = $cotizaciones->euroVenta;
                }

                // Guardar el detalle de cotización actualizado
                $detail->save();
            }
        }
    }
}
