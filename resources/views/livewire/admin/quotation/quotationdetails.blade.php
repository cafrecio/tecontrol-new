<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <!--table for input quotationDetails-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th style="width: 10%">Precio Unit</th>
                                <th>Moneda</th>
                                <th>Cotizacion</th>
                                <th>Precio Ars</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Facturado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotationDetails as $detalle)
                            <tr>
                                <td>
                                    {{ $detalle->product->descripcion_cotizacion }}
                                </td>
                                <td style="min-width: 180px;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                        </div>
                                        <input type="number"
                                            wire:change="cambioPrecio($event.target.value, {{ $detalle->id }})"
                                            class="form-control text-right" value="{{ $detalle->precio }}">
                                    </div>
                                </td>
                                <td style="white-space: nowrap; text-align:center">
                                    {{ $detalle->currency->moneda}}
                                </td>
                                <td style="white-space: nowrap; text-align:end">
                                    {{ $detalle->cotizacion }}
                                </td>
                                <td style="white-space: nowrap; text-align:end">
                                    $ {{ number_format($detalle->precio * $detalle->cotizacion,2,",",".") }}
                                </td>
                                <td style="width: 1%">
                                    <input type="number"
                                        wire:change="cambioCantidad($event.target.value, {{ $detalle->id }})"
                                        class="form-control text-right" value="{{ $detalle->cantidad }}">
                                </td>
                                <td style="white-space: nowrap; text-align:end">
                                    $ {{ number_format($detalle->precio * $detalle->cotizacion *
                                    $detalle->cantidad,2,",",".")}}
                                </td>

                                <td style="width: 1%">
                                    <div class="form-check">
                                        <input type="checkbox"
                                            wire:change="cambioFacturado($event.target.checked, {{ $detalle->id }})"
                                            class="form-control" {{ $detalle->facturado? 'checked' : '' }}
                                        style="width:50%">
                                    </div>
                                </td>
                                <td>
                                    <button wire:click="$emit('deleteDet', {{ $detalle->id }})"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- button for open modal for find and select products-->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#productModal">Agregar
                        Producto</button>
                </div>
            </div>
        </div>
    </div>

    <!-- popup for find and select products-->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" style="max-height: 90vh; overflow: scroll;">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="productModalLabel">Productos</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"
                        wire:click="clearProduct">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--input for search products-->
                    <input type="text" wire:model="searchTerm" class="form-control" placeholder="Buscar...">
                    <!--table for show products-->
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Moneda</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->descripcion_cotizacion }}</td>
                                <td>{{ $product->moneda()->first()->moneda }}</td>
                                <td>{{ number_format($product->precio_venta, 2, ",",".") }}</td>
                                <td>
                                    <button class="btn btn-primary"
                                        wire:click="addProduct({{ $product->id }})">Agregar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div wire:loading>
        <div class="modload">
            <div class="spinload">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>

</div>