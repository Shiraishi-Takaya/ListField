<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = User::find(1)->tasks;

        return view('index')
            -> with(['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $task = new Task();
        $task->user_id = 1;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date = $request->date;
        $task->time = $request->time;
        $task->is_done = false;
        $task->x_position = 0;
        $task->y_position = 0;
        $task->width = 4;
        $task->height = 4;
        $task->color = $request->color;
        $task->save();

        $data = User::find(1)->tasks;
        return $data;
    }
}
