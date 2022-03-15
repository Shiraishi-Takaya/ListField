<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = User::find(1)->tasks;

        return view('index')
            -> with(['tasks' => $tasks]);
    }
}
