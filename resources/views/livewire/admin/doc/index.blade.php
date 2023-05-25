<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col col-md-2">
                    <div class="form-group">
                        <!-- select for year from 2020 to actual year +1-->
                        <label for="ano">Año</label>
                        <select wire:model="ano" class="form-control">
                            @for ($i = 2022; $i <= date('Y') + 1; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <div class="col col-md-2">
                    <div class="form-group">
                        <!-- select for month from 1 to 12-->
                        <label for="mes">Mes</label>
                        <select wire:model="mes" class="form-control">
                            <option value="">Todos</option>
                            @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                        </select>
                    </div>
                </div>
                <div class="col col-md-4">
                    <div class="form-group">
                        <!-- select for clients-->
                        <label for="client_id">Cliente</label>
                        <select wire:model="client_id" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->razon_social }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col col-md-2">
                    <div class="form-group">
                        <!--buton clean filters with eraser icon-->
                        <button wire:click="borrarFiltros" class="btn btn-outline-secondary" style="margin-top:32px;"><i
                                class="fas fa-eraser"></i>Borrar Filtros</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <!-- table for quotations-->
            <table class="table table-striped table-bordered">
                <!-- sticky header for table-->
                <thead class="thead-dark sticky-top" style="top:60px">
                    <tr>
                        <th>Fecha</th>
                        <th>Nro</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Solic. Cotiz.</th>
                        <th>Cotizacion</th>
                        <th>Orden Compra</th>
                        <th>Facturas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotations as $quotation)
                    <tr>
                        <td style="white-space: nowrap;">{{ date('d-m-Y', strtotime($quotation->fecha)) }}</td>
                        <td>{{ $quotation->nro }}</td>
                        <td>
                            @isset($quotation->client->razon_social)
                               {{ $quotation->client->razon_social }}
                            @endisset
                        </td> 
                        <td>${{ number_format($quotation->total(),2,",",".") }}</td>
                        <td>{{ $quotation->quotationState->state }}</td>
                        <td>
                            @if ($quotation->solicitudCotizacion)
                            <a href="{{ asset('storage/'.$quotation->solicitudCotizacion) }}" target="_blank">Ver</a>
                            @endif
                        </td>
                        <td>
                            @if ($quotation->cotizacion)
                            <a href="{{ asset('storage/'.$quotation->cotizacion) }}" target="_blank">Ver</a>
                            @endif
                        </td>
                        <td>
                            @if ($quotation->ordenCompra)
                            <a href="{{ asset('storage/'.$quotation->ordenCompra) }}" target="_blank">Ver</a>
                            @endif
                        </td>
                        <td>
                            @foreach ($quotation->quotationDocs as $index => $factura)
                            <a href="{{ asset('storage/'.$factura->factura) }}" target="_blank">Factura {{ $index +1 }}</a> - 
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div wire:loading>
        <div class="modload">
            <div class="spinload">
                <i class="fa-solid fa-temperature-three-quarters fa-bounce2"></i>
            </div>
        </div>
    </div>
</div>