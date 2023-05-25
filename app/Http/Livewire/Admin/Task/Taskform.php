<?php

namespace App\Http\Livewire\Admin\Task;

use Livewire\Component;
use App\Models\Task;

class Taskform extends Component
{
    public $task;

    protected $rules = [
        'task.tarea' => 'required',
        'task.fecha_ini' => 'required|date',
        'task.fecha_fin' => 'required|date|after_or_equal:task.fecha_ini',
        'task.check' => 'nullable',
    ];

    public function mount(Task $task = null){
        if($task){
            $this->task = $task;
        }
        else{
            $this->task = new Task();
        }
    }
    public function render()
    {
        return view('livewire.admin.task.taskform');
    }

    public function guardar(){
        
        $this->validate();
        $this->task->save();
        $this->emit('cerrarModal');
        
    }
}
