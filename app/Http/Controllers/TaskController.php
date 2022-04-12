<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
    public function show()
    {
        $data = User::find(1)->tasks;

        return $data;
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
        $task->x = 0;
        $task->y = $request->y;
        $task->w = 6;
        $task->h = 3;
        $task->i = 0;
        $task->color = $request->color;
        $task->save();
        $task->i = $task->id;
        $task->save();

        $data = $task;
        return $data;
    }

    public function move(Request $request)
    {
        $tasks = User::find(1)->tasks();
        $task = $tasks->find($request->target);

        $task->x = $request->x;
        $task->y = $request->y;
        $task->save();

        $data = $task;
        return $data;
    }

    public function resize(Request $request)
    {
        $tasks = User::find(1)->tasks();
        $task = $tasks->find($request->target);

        $task->w = $request->w;
        $task->h = $request->h;
        $task->save();

        $data = $task;
        return $data;
    }
}
