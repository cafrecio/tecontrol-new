<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $supplierFilter = '';
    public $categoryFilter = '';
    public $editDescriptionPedido = [];
    public $editDescriptionCotizacion = [];
    public $editSupplier = [];
    public $editCurrency = [];
    public $editCategory = [];
    public $editPurchasePrice = [];
    public $editSalePrice = [];
    public $editReorderPoint = [];
    public $editInitialStock = [];
    public $editProduct = [];

    public function render()
    {
        $products = Product::with(['categoria', 'moneda', 'proveedor'])
            ->when($this->supplierFilter, function ($query) {
                $query->where('supplier_id', $this->supplierFilter);
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('descripcion_pedido', 'LIKE', "%{$this->search}%")
                        ->orWhere('descripcion_cotizacion', 'LIKE', "%{$this->search}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(20);

        $suppliers = Supplier::all();
        $categories = Category::all();
        $currencies = Currency::all();

        return view('livewire.products-table', compact('products', 'suppliers', 'categories', 'currencies'));
    }

    public function editDescriptionPedido($productId)
    {
        $this->editDescriptionPedido[$productId] = true;
    }

    public function saveDescriptionPedido($productId)
    {
        $product = Product::find($productId);
        $product->update(['descripcion_pedido' => $this->editDescriptionPedido[$productId]]);
        unset($this->editDescriptionPedido[$productId]);
    }

    public function editDescriptionCotizacion($productId)
    {
        $this->editDescriptionCotizacion[$productId] = true;
    }

    public function saveDescriptionCotizacion($productId)
    {
        $product = Product::find($productId);
        $product->update(['descripcion_cotizacion' => $this->editDescriptionCotizacion[$productId]]);
        unset($this->editDescriptionCotizacion[$productId]);
    }

    public function editSupplier($productId)
    {
        $this->editSupplier[$productId] = true;
    }

    public function saveSupplier($productId)
    {
        $product = Product::find($productId);
        $product->update(['supplier_id' => $this->editSupplier[$productId]]);
        unset($this->editSupplier[$productId]);
    }

    public function editCurrency($productId)
    {
        $this->editCurrency[$productId] = true;
    }

    public function saveCurrency($productId)
    {
        $product = Product::find($productId);
        $product->update(['currency_id' => $this->editCurrency[$productId]]);
        unset($this->editCurrency[$productId]);
    }

    public function editCategory($productId)
    {
        $this->editCategory[$productId] = true;
    }

    public function saveCategory($productId)
    {
        $product = Product::find($productId);
        $product->update(['category_id' => $this->editCategory[$productId]]);
        unset($this->editCategory[$productId]);
    }
    public function editPurchasePrice($productId)
    {
        $this->editPurchasePrice[$productId] = true;
    }

    public function savePurchasePrice($productId)
    {
        $product = Product::find($productId);
        $product->update(['purchase_price' => $this->editPurchasePrice[$productId]]);
        unset($this->editPurchasePrice[$productId]);
    }

    public function editSalePrice($productId)
    {
        $this->editSalePrice[$productId] = true;
    }

    public function saveSalePrice($productId)
    {
        $product = Product::find($productId);
        $product->update(['sale_price' => $this->editSalePrice[$productId]]);
        unset($this->editSalePrice[$productId]);
    }

    public function editReorderPoint($productId)
    {
        $this->editReorderPoint[$productId] = true;
    }

    public function saveReorderPoint($productId)
    {
        $product = Product::find($productId);
        $product->update(['reorder_point' => $this->editReorderPoint[$productId]]);
        unset($this->editReorderPoint[$productId]);
    }

    public function editInitialStock($productId)
    {
        $this->editInitialStock[$productId] = true;
    }

    public function saveInitialStock($productId)
    {
        $product = Product::find($productId);
        $product->update(['initial_stock' => $this->editInitialStock[$productId]]);
        unset($this->editInitialStock[$productId]);
    }

    public function delete($productId)
    {
        Product::find($productId)->delete();
    }
}
?>