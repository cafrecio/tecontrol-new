<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesTable extends Component
{
    public $categories;
    public $selectedCategoryId;
    public $categoryDescription;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
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

    $this->mount();
}

public function editCategory($categoryId)
{
    $this->selectedCategoryId = $categoryId;
    $category = Category::find($categoryId);
    $this->categoryDescription = $category->descripcion;
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

    $this->mount();
}

public function deleteCategory($categoryId)
{
    $category = Category::find($categoryId);
    $category->delete();

    session()->flash('message', 'Categoría eliminada correctamente.');

    $this->mount();
}



/*    
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
    $this->categoryDescription = $category->descripcion;
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
*/
/* public function mount()
    {
        $this->categories = Category::all();
    }

    public function addCategory()
    {
        $this->validate([
            'categoryDescription' => 'required',
        ]);

        Category::create([
            'descripcion' => $this->categoryDescription,
        ]);

        $this->categoryDescription = '';
        $this->categories = Category::all();
    }

    public function editCategory($categoryId)
    {
        $this->selectedCategoryId = $categoryId;
        $category = Category::find($categoryId);
        $this->categoryDescription = $category->descripcion;
    }

    public function updateCategory()
    {
        $this->validate([
            'categoryDescription' => 'required',
        ]);

        $category = Category::find($this->selectedCategoryId);
        $category->update([
            'descripcion' => $this->categoryDescription,
        ]);

        $this->categoryDescription = '';
        $this->selectedCategoryId = null;
        $this->categories = Category::all();
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);
        $this->categories = Category::all();
    } */
}
