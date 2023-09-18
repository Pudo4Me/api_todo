<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function getTasks()
    {
        $tasks = Task::all();
        return view('tasks', $data = ['tasks' => $tasks]);
    }

    public function isComplete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->completed = $request->completed;
            return $task->save();
        }
        return 'Not found';
    }

    public function createTask(Request $request)
    {
        $task = new Task();
        $text = $request->text;
        if ($text) {
            $task->text = $text;
            $task->save();
            return redirect('/');
        }
        return 'The text was not written';
    }

    public function deleteTask(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect('/');
        }
        return 'Not found';
    }
}
