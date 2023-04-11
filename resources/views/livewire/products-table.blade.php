<div>
    
    <div class="row mb-12">
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Buscar..." wire:model="searchTerm">
        </div>
    </div>
    <div class="text-center" padding="10px">
        <h3>Agregar productos</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Descripción Pedido</th>
                    <th>Descripción Cotización</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Moneda</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Punto Pedido</th>
                    <th>Stock Inicial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td><input type="text" class="form-control" wire:model="requisitionDescription" id="requisitionDescription" placeholder="Ingrese la descripción del pedido"></td>
                    <td><input type="text" class="form-control" wire:model="quotationDescription" id="quotationDescription" placeholder="Ingrese la descripción de la cotización"></td>
                    <td>
                        <select class="form-control" wire:model="supplierId" id="supplierId">
                            <option value="">Seleccione...</option>
                            @foreach ($suppliers as $supplier)
                                <option value={{ $supplier->id }}>{{ $supplier->razon_social }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" wire:model="categoryId" id="categoryId">
                            <option value="">Seleccione...</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->descripcion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" wire:model="currencyId" id="currencyId">
                            <option value="">Seleccione...</option>
                            @foreach ($currencies as $currency)
                                <option value={{ $currency->id }}>{{ $currency->moneda }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" class="form-control" wire:model="purchasePrice" id="purchasePrice"></td>
                    <td><input type="number" class="form-control" wire:model="salePrice" id="salePrice"></td>
                    <td><input type="number" class="form-control" wire:model="reorderPoint" id="reorderPoint"></td>
                    <td><input type="number" class="form-control" wire:model="initialStock" id="initialStock"></td>
                    <td style="white-space: nowrap;">
                        <button wire:click="createProduct" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                        <button wire:click="editCategory(null)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Descripción Pedido</th>
                    <th>Descripción Cotización</th>
                    <th>Proveedor</th>
                    <th>Categoría</th>
                    <th>Moneda</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Punto Pedido</th>
                    <th>Stock Inicial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($products as $product)
                <tr>
                    <td>
                        <span wire:click="editProduct({{ $product->id }}, 'descripcion_pedido', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'descripcion_pedido', $event.target.innerText)"
                              contenteditable>{{ $product->descripcion_pedido }}</span>
                    </td>
                    
                    <td>
                        <span wire:click="editProduct({{ $product->id }}, 'descripcion_cotizacion', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'descripcion_cotizacion', $event.target.innerText)"
                              contenteditable>{{ $product->descripcion_cotizacion }}</span>
                    </td>
                    <td>
                        <select class="form-control" id="editSupplierId" wire:change="updateSupplier({{$product->id}},$event.target.value)"
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{$supplier->id == $product->proveedor ? 'selected':''}}>{{ $supplier->razon_social }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="editCategoryId" wire:change="updateCategory({{$product->id}},$event.target.value)"
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{$category->id == $product->categoria ? 'selected':''}}>{{ $category->descripcion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="editCurrencyId" wire:change="updateCurrency({{$product->id}},$event.target.value)">
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}" {{$currency->id == $product->moneda ? 'selected':''}}>{{ $currency->moneda }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td 
                        span wire:click="editProduct({{ $product->id }}, 'precio_compra', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'precio_compra', $event.target.innerText)"
                              contenteditable>{{ $product->precio_compra }}</span>
                    </td>
                    <td 
                        span wire:click="editProduct({{ $product->id }}, 'precio_venta', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'precio_venta', $event.target.innerText)"
                              contenteditable>{{ $product->precio_venta }}</span>
                    </td>
                    <td 
                        span wire:click="editProduct({{ $product->id }}, 'punto_pedido', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'punto_pedido', $event.target.innerText)"
                              contenteditable>{{ $product->punto_pedido }}</span>
                    </td>
                    <td 
                        span wire:click="editProduct({{ $product->id }}, 'stock_inicial', $event.target.innerText)" 
                              wire:blur="editProduct({{ $product->id }}, 'stock_inicial', $event.target.innerText)"
                              contenteditable>{{ $product->stock_inicial }}</span>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="deleteProduct({{ $product->id }})"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                    @endforeach
            </tbody>
        </table>
    </div>       
    <div class="row mt-3">
        <div class="col-md-12">
            {{ $products->links() }}
        </div>
    </div>
</div>    

