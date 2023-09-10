<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getAll()
    {
        $task = Task::all();
        return $task;
    }

    public function checkTask(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            return $task->toArray();
        }
        return 'Not found';
    }

    public function create(Request $request)
    {
        $task = new Task();
        $text = $request->text;
        if ($text) {
            $task->text = $text;
            $task->save();
            return redirect('/');
        }
        return 'Write the text';
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            return $task->delete();
        }
        return 'Not found';
    }
}
