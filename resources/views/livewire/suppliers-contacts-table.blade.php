<div>
    <div style="overflow-y: scroll; max-height: 250px;">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th>Apellido y nombre</th>
                    <th>Teléfono</th>
                    <th>Mail</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>
                            @if($editedContactId === $contact->id)
                                <input type="text" wire:model="apellido_nombre" class="form-control"/>
                                @error('apellido_nombre') 
                                    <span class="error">{{ $message }}</span> 
                                @enderror
                            @else
                                {{ $contact->apellido_nombre }}
                            @endif
                        </td>
                        <td>
                            @if($editedContactId === $contact->id)
                                <input type="text" wire:model="telefono" class="form-control"/>
                                @error('telefono') 
                                    <span class="error">{{ $message }}</span> 
                                @enderror
                            @else
                                {{ $contact->telefono }}
                            @endif
                        </td>
                        <td>
                            @if($editedContactId === $contact->id)
                                <input type="text" wire:model="mail" class="form-control"/>
                                @error('mail') 
                                    <span class="error">{{ $message }}</span> 
                                @enderror
                            @else
                                {{ $contact->mail }}
                            @endif
                        </td>
                        <td>
                            @if($editedContactId === $contact->id)
                                <input type="text" wire:model="puesto" class="form-control"/>
                            @else
                                {{ $contact->puesto }}
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                @if ($editedContactId === $contact->id)
                                    <button wire:click="updateContact" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                                    <button wire:click="cancelEdit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                @else
                                    <button wire:click="editedContactId({{ $contact->id }})" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></button>
                                    <button wire:click="deleteContact({{ $contact->id }})" onclick="return confirm('¿Está seguro de que desea eliminar este contacto?')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        <input type="text" wire:model.defer="nApellidoNombre" placeholder="Ingrese Apellido y nombre" class="form-control"/>
                        @error('nApellidoNombre') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><input type="text" wire:model.defer="nTelefono" placeholder="Ingrese Teléfono" class="form-control"/></td>
                    <td>
                        <input type="text" wire:model.defer="nMail" placeholder="Ingrese Mail" class="form-control"/>
                        @error('nMail') 
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </td>
                    <td><input type="text" wire:model.defer="nPuesto" placeholder="Ingrese Puesto" class="form-control"/></td>
                    <td>
                    <button wire:click="addContact" class="btn btn-success btn-sm mr-1"><i class="fa fa-check"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
                
</div>