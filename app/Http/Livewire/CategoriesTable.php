<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesTable extends Component
{
    public $categories;
    public $selectedCategoryId;
    public $categoryDescription;


    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.categories-table', [
            'categories' => $this->categories,
        ]);
    }

    public function addCategory()
    {
        $this->validate([
            'categoryDescription' => 'required|unique:categories,descripcion'
        ]);

        Category::create([
            'descripcion' => $this->categoryDescription
        ]);

        $this->categoryDescription = '';

        session()->flash('message', 'Categoría agregada correctamente.');

    }

    public function editCategory($categoryId)
    {
        $this->selectedCategoryId = $categoryId;
        $category = Category::find($categoryId);
        if ($category) {
            $this->categoryDescription = $category->descripcion;
        }
    }


    public function updateCategory()
    {
        $this->validate([
            'categoryDescription' => 'required|unique:categories,descripcion,' . $this->selectedCategoryId
        ]);

        $category = Category::find($this->selectedCategoryId);
        $category->descripcion = $this->categoryDescription;
        $category->save();

        $this->selectedCategoryId = null;
        $this->categoryDescription = '';

        session()->flash('message', 'Categoría actualizada correctamente.');

    }

    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();

        session()->flash('message', 'Categoría eliminada correctamente.');

    }
}
