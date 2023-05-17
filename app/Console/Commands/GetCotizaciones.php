<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CotizacionBna;

class GetCotizaciones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-cotizaciones';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $cot = new CotizacionBna();
        $cotizaciones = $cot->getCotiz();
        cache()->put('cotizaciones', $cotizaciones);
    }
}
