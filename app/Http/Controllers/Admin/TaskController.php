<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use DateTime;
use DateInterval;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $events = [];
        
        foreach ($tasks as $task) {
            $fechFin = new DateTime($task->fecha_fin);
            $fechFin->add(new DateInterval('P1D'));
            $fechFin = $fechFin->format('Y-m-d');
            $events[] = 
                [
                    'title' => $task->tarea,
                    'start' => $task->fecha_ini,
                    'end' => $fechFin,
                    'color' => $task->color,
                ];
        }
        return view('admin.tasks.index', compact('events'));
    }
}
