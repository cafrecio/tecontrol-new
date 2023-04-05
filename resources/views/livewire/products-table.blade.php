<div>
    <div class="flex justify-between">
        <div>
            <input type="text" wire:model="search" placeholder="Buscar producto" class="border rounded-md py-2 px-4">
        </div>
        <div>
            <select wire:model="supplierFilter" class="border rounded-md py-2 px-4">
                <option value="">Proveedor</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->razon_social }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select wire:model="categoryFilter" class="border rounded-md py-2 px-4">
                <option value="">Categoría</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->descripcion }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mt-4">
        <table class="w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">Descripción pedido</th>
                    <th class="border px-4 py-2">Descripción cotización</th>
                    <th class="border px-4 py-2">Proveedor</th>
                    <th class="border px-4 py-2">Categoría</th>
                    <th class="border px-4 py-2">Precio de compra</th>
                    <th class="border px-4 py-2">Precio de venta</th>
                    <th class="border px-4 py-2">Punto de reorden</th>
                    <th class="border px-4 py-2">Moneda</th>
                    <th class="border px-4 py-2">Stock inicial</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">
                            <div wire:click="editDescriptionPedido({{ $product->id }})">
                                @if (isset($editDescriptionPedido[$product->id]))
                                    <input wire:model="editDescriptionPedido.{{ $product->id }}" class="border rounded-md py-1 px-2" type="text">
                                @else
                                    {{ $product->descripcion_pedido }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editDescriptionCotizacion({{ $product->id }})">
                                @if (isset($editDescriptionCotizacion[$product->id]))
                                    <input wire:model="editDescriptionCotizacion.{{ $product->id }}" class="border rounded-md py-1 px-2" type="text">
                                @else
                                    {{ $product->descripcion_cotizacion }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editSupplier({{ $product->id }})">
                                @if (isset($editSupplier[$product->id]))
                                    <select wire:model="editSupplier.{{ $product->id }}" class="border rounded-md py-1 px-2">
                                        <option value="">Seleccione proveedor</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->razon_social }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    {{ $product->supplier->razon_social ?? '' }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editCategory({{ $product->id }})">
                                @if (isset($editCategory[$product->id]))
                                    <select wire:model="editCategory.{{ $product->id }}" class="border rounded-md py-1 px-2">
                                        <option value="">Seleccione categoría</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->descripcion }}</option>
                                        @endforeach
                                    </select>
                                @else
                                        {{ $product->category->descripcion ?? '' }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editCompra({{ $product->id }})">
                                @if (isset($editCompra[$product->id]))
                                    <input wire:model="editCompra.{{ $product->id }}" class="border rounded-md py-1 px-2" type="number" step="0.01" min="0">
                                @else
                                    {{ $product->precio_compra }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editVenta({{ $product->id }})">
                                @if (isset($editVenta[$product->id]))
                                    <input wire:model="editVenta.{{ $product->id }}" class="border rounded-md py-1 px-2" type="number" step="0.01" min="0">
                                @else
                                    {{ $product->precio_venta }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div wire:click="editPuntoReorden({{ $product->id }})">
                                @if (isset($editPuntoReorden[$product->id]))
                                    <input wire:model="editPuntoReorden.{{ $product->id }}" class="border rounded-md py-1 px-2" type="number" min="0">
                                @else
                                    {{ $product->punto_reorden }}
                                @endif
                            </div>
                        </td>
                        <td class="border px-4 py-2">{{ $product->moneda }}</td>
                        <td class="border px-4 py-2">{{ $product->stock }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="deleteProduct({{ $product->id }})" class="border rounded-md py-1 px-2 bg-red-500 text-white">Eliminar</button>
                        </td>
                        </tr>
                    @empty
                <tr>
                    <td class="border px-4 py-2" colspan="11">No hay productos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>        


