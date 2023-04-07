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
                    <td>
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
                    <td contenteditable="true" wire:key="descripcion_pedido-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'descripcion_pedido', $event.target.textContent)">{{ $product->descripcion_pedido }}</td>
                    <td contenteditable="true" wire:key="descripcion_cotizacion-{{ $product->id }}" wire:blur
                            ="editProduct({{ $product->id }},'descripcion_cotizacion', $event.target.textContent)">{{ $product->descripcion_cotizacion }}</td>
                    <td contenteditable="true" wire:key="proveedor-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'proveedor', $event.target.textContent)">
                            <option value="{{ $supplier->id }}" @if($product->proveedor == $supplier->id) selected @endif>{{ $supplier->razon_social }}</option>
                    </td>
                    <td contenteditable="true" wire:key="categoria-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'categoria', $event.target.textContent)">
                            <option value="{{ $category->id }}" @if($product->categoria == $category->id) selected @endif>{{ $category->descripcion }}</option>
                    </td>
                    <td contenteditable="true" wire:key="moneda-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'moneda', $event.target.textContent)">
                            <option value="{{ $currency->id }}" @if($product->moneda == $currency->id) selected @endif>{{ $currency->moneda }}</option>
                    </td>
                    <td contenteditable="true" wire:key="precio_compra-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'precio_compra', $event.target.textContent)">{{ $product->precio_compra }}</td>
                    <td contenteditable="true" wire:key="precio_venta-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'precio_venta', $event.target.textContent)">{{ $product->precio_venta }}</td>
                    <td contenteditable="true" wire:key="punto_pedido-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'punto_pedido', $event.target.textContent)">{{ $product->punto_pedido }}</td>
                    <td contenteditable="true" wire:key="stock_inicial-{{ $product->id }}" wire:blur="editProduct({{ $product->id }},'stock_inicial', $event.target.textContent)">{{ $product->stock_inicial }}</td>
                    <td>
                        <button class="btn btn-danger" wire:click="deleteProduct({{ $product->id }})">Eliminar</button>
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

