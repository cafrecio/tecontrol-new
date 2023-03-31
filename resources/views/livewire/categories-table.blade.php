<div>
    <form wire:submit.prevent="addCategory">
        <div class="form-group">
            <label for="categoryDescription">Descripción:</label>
            <input type="text" class="form-control" wire:model="categoryDescription" id="categoryDescription" placeholder="Ingrese la descripción de la categoría">
            @error('categoryDescription') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

    <hr>

    <table class="table table-striped" id="categoriesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        @if($selectedCategoryId == $category->id)
                            <input type="text" class="form-control" wire:model="categoryDescription" wire:keydown.enter="updateCategory">
                            @error('categoryDescription') <span class="text-danger">{{ $message }}</span> @enderror
                        @else
                            <span wire:click="editCategory({{ $category->id }})">{{ $category->descripcion }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex">
                            @if($selectedCategoryId == $category->id)
                                <button wire:click="updateCategory" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                                <button wire:click="editCategory(null)" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            @else
                                <button wire:click="editCategory({{ $category->id }})" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></button>
                                <button wire:click="deleteCategory({{ $category->id }})" onclick="return confirm('¿Está seguro de que desea eliminar esta categoría?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Reemplazar "APP_URL" con la URL de su aplicación
    const socket = io('http://localhost:8000');

    socket.on('categoryAdded', (data) => {
        Livewire.emit('categoryAdded', data);
    });

    socket.on('categoryUpdated', (data) => {
        Livewire.emit('categoryUpdated', data);
    });

    socket.on('categoryDeleted', (data) => {
        Livewire.emit('categoryDeleted', data);
    });
</script>
