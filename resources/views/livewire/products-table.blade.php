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
                <tr class="text-center">
                    <th style="width: 20%;">Descripción Pedido</th>
                    <th style="width: 20%;">Descripción Cotización</th> 
                    <th style="width: 10%;">Proveedor</th>
                    <th style="width: 10%;">Categoría</th>
                    <th style="width: 5%;">Moneda</th>
                    <th style="width: 10%;">Precio Compra</th>
                    <th style="width: 10%;">Precio Venta</th>
                    <th style="width: 5%;">Punto Pedido</th>
                    <th style="width: 5%;">Stock Inicial</th>
                    <th style="width: 5%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                <tr style="vertical-align: middle;">
                    <td><textarea rows="5" class="form-control" wire:model="nRequisitionDescription" id="requisitionDescription"
                         placeholder="Ingrese la descripción del pedido"></textarea>
                        @error('Descripción Pedido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><input type="text" class="form-control" wire:model="nQuotationDescription" id="quotationDescription" placeholder="Ingrese la descripción de la cotización">
                        @error('Descripción Cotización')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <select class="form-control" wire:model="nSupplierId" id="supplierId">
                            <option value="">Seleccione...</option>
                            @foreach ($suppliers as $supplier)
                                <option value={{ $supplier->id }}>{{ $supplier->razon_social }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" wire:model="nCategoryId" id="categoryId">
                            <option value="">Seleccione...</option>
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->descripcion }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" wire:model="nCurrencyId" id="currencyId">
                            <option value="">Seleccione...</option>
                            @foreach ($currencies as $currency)
                                <option value={{ $currency->id }}>{{ $currency->moneda }}</option>
                            @endforeach
                        </select>
                        @error('currencyId')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                        <input type="number" class="form-control" wire:model="nPurchasePrice" id="purchasePrice">
                        </div>
                    </td>
                    <td>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                        <input type="number" class="form-control" wire:model="nSalePrice" id="salePrice">
                        </div>
                        @error('Precio Venta')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><input type="number" class="form-control" wire:model="nReorderPoint" id="reorderPoint"></td>
                    <td><input type="number" class="form-control" wire:model="nInitialStock" id="initialStock"></td>
                    <td style="white-space: nowrap;">
                        <button wire:click="createProduct" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                        <button wire:click="cancelNew" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
            </tbody>
                <tr style="height: 30px;"></tr>
            <thead>
                <tr class="text-center">
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
                            @if($editedProduct_id == $product->id)
                                    <input type="text" class="form-control" wire:model="requisitionDescription">
                                @error('requisitionDescription')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $product->descripcion_pedido }}
                            @endif
                        </td>
                        <td>
                            @if($editedProduct_id == $product->id)
                                    <input type="text" class="form-control" wire:model="quotationDescription">
                                @error('quotationDescription')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $product->descripcion_cotizacion }}
                            @endif
                        </td>
                        <td>
                            @if($editedProduct_id == $product->id)
                                <select class="form-control" wire:model="supplierId">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"{{ $product->proveedor == 
                                            $supplier->id ? 'selected' : '' }}>{{ $supplier->razon_social }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                @foreach($suppliers as $supplier)
                                    @if($supplier->id == $product->proveedor)
                                        {{ $supplier->razon_social }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($editedProduct_id == $product->id)
                                <select class="form-control" wire:model="categoryId">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{{ $product->categoria == 
                                            $category->id ? 'selected' : '' }}>{{ $category->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                @foreach($categories as $category)
                                    @if($category->id == $product->categoria)
                                        {{ $category->descripcion }}
                                    @endif
                                @endforeach
                            @endif
                        <td>
                            @if($editedProduct_id == $product->id)
                                <select class="form-control" wire:model="currencyId">
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"{{ $product->moneda == 
                                            $currency->id ? 'selected' : '' }}>{{ $currency->moneda }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('currencyId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                @foreach($currencies as $currency)
                                    @if($currency->id == $product->moneda)
                                        {{ $currency->moneda }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if($editedProduct_id == $product->id)
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" wire:model="purchasePrice">
                                </div>
                            @else
                                {{ $product->precio_compra }}
                            @endif
                        </td>
                        <td>
                            @if($editedProduct_id == $product->id)
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="text" class="form-control" wire:model="salePrice">
                                </div>
                                @error('salePrice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            @else
                                {{ $product->precio_venta }}
                            @endif
                        </td>
                        <td style="align-content: center;">
                            @if($editedProduct_id == $product->id)
                                    <input type="text" class="form-control" wire:model="reorderPoint">
                            @else
                                {{ $product->punto_pedido }}
                            @endif
                        </td>
                        <td style="align-content: center;">
                            @if($editedProduct_id == $product->id)
                                    <input type="text" class="form-control" wire:model="initialStock">
                            @else
                                {{ $product->stock_inicial }}
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                @if ($editedProduct_id == $product->id)
                                    <button wire:click="updateProduct()" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                                    <button wire:click="cancelEdit()" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                @else
                                    <button wire:click="editedProduct({{ $product->id }})" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></button>
                                    <button wire:click="deleteProduct({{ $product->id }})" onclick="return confirm('¿Está seguro de que desea eliminar este producto?')" 
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $products->links() }}
    </div>
</div>    

