<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show()
    {
        $data = User::find(1)->task;
        return $data;
    }

    public function create()
    {
        
    }
}
